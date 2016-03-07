<?php
session_start();

// get post parameters
$PDF_TITLE = isset($_POST['pdf_nam']) ? $_POST['pdf_nam']:'';
$PDF_CATEGORY_TITLE = isset($_POST['image_location']) ? $_POST['image_location']:'';
$EMAIL_TO = isset($_POST['email_add']) ? $_POST['email_add']:'';
$EMAIL_CC = isset($_POST['email_cc']) ? $_POST['email_cc']:'';
$WEBSITE_URL = isset($_POST['website_url']) ? $_POST['website_url']:'';
$pdf_images = isset($_POST['pdf_images']) ? $_POST['pdf_images']:'';
$theme_path = isset($_POST['theme_path']) ? $_POST['theme_path']:'';

define('WEBSITE_URL', $WEBSITE_URL);



require('fpdf/fpdf.php');
//function hex2dec
//returns an associative array (keys: R,G,B) from
//a hex html code (e.g. #3FE5AA)
function hex2dec($couleur = "#000000") 
{
  $R = substr($couleur, 1, 2);
  $rouge = hexdec($R);
  $V = substr($couleur, 3, 2);
  $vert = hexdec($V);
  $B = substr($couleur, 5, 2);
  $bleu = hexdec($B);
  $tbl_couleur = array();
  $tbl_couleur['R'] = $rouge;
  $tbl_couleur['V'] = $vert;
  $tbl_couleur['B'] = $bleu;
  return $tbl_couleur;
}

//conversion pixel -> millimeter at 72 dpi
function px2mm($px) 
{
  return $px * 25.4 / 72;
}

function txtentities($html) 
{
  $trans = get_html_translation_table(HTML_ENTITIES);
  $trans = array_flip($trans);
  return strtr($html, $trans);
}

////////////////////////////////////
class PDF_HTML extends FPDF {

//variables of html parser
  var $B;
  var $I;
  var $U;
  var $HREF;
  var $fontList;
  var $issetfont;
  var $issetcolor;

  const DPI = 96;
  const MM_IN_INCH = 25.4;

  // tweak these values (in pixels)
  function pixelsToMM($val) 
  {
    return $val * self::MM_IN_INCH / self::DPI;
  }

  function resizeToFit($imgFilename) {
    list($width, $height) = getimagesize($imgFilename);

    $widthScale = self::MAX_WIDTH / $width;
    $heightScale = self::MAX_HEIGHT / $height;

    $scale = min($widthScale, $heightScale);

    return array(
        round($this->pixelsToMM($scale * $width)),
        round($this->pixelsToMM($scale * $height))
    );
  }

  function PDF_HTML($orientation = 'P', $unit = 'mm', $format = 'A4') {
    //Call parent constructor
    $this->FPDF($orientation, $unit, $format);
    //Initialization
    $this->B = 0;
    $this->I = 0;
    $this->U = 0;
    $this->HREF = '';
    $this->fontlist = array('arial', 'times', 'courier', 'helvetica', 'symbol');
    $this->issetfont = false;
    $this->issetcolor = false;
  }

  function WriteHTML($html) {
    //HTML parser
    $html = strip_tags($html, "<b><u><i><a><img><p><br><strong><em><font><tr><blockquote>"); //supprime tous les tags sauf ceux reconnus
    $html = str_replace("\n", ' ', $html); //remplace retour à la ligne par un espace
    $a = preg_split('/<(.*)>/U', $html, -1, PREG_SPLIT_DELIM_CAPTURE); //éclate la chaîne avec les balises
    foreach ($a as $i => $e) {
      if ($i % 2 == 0) {
        //Text
        if ($this->HREF)
          $this->PutLink($this->HREF, $e);
        else
          $this->Write(5, stripslashes(txtentities($e)));
      }
      else {
        //Tag
        if ($e[0] == '/')
          $this->CloseTag(strtoupper(substr($e, 1)));
        else {
          //Extract attributes
          $a2 = explode(' ', $e);
          $tag = strtoupper(array_shift($a2));
          $attr = array();
          foreach ($a2 as $v) {
            if (preg_match('/([^=]*)=["\']?([^"\']*)/', $v, $a3))
              $attr[strtoupper($a3[1])] = $a3[2];
          }
          $this->OpenTag($tag, $attr);
        }
      }
    }
  }

  function OpenTag($tag, $attr) {
    //Opening tag
    switch ($tag) {
      case 'STRONG':
        $this->SetStyle('B', true);
        break;
      case 'EM':
        $this->SetStyle('I', true);
        break;
      case 'B':
      case 'I':
      case 'U':
        $this->SetStyle($tag, true);
        break;
      case 'A':
        $this->HREF = $attr['HREF'];
        break;
      case 'IMG':
        if (isset($attr['SRC']) && (isset($attr['WIDTH']) || isset($attr['HEIGHT']))) {
          if (!isset($attr['WIDTH']))
            $attr['WIDTH'] = 0;
          if (!isset($attr['HEIGHT']))
            $attr['HEIGHT'] = 0;
          $this->Image($attr['SRC'], $this->GetX(), $this->GetY(), px2mm($attr['WIDTH']), px2mm($attr['HEIGHT']));
        }
        break;
      case 'TR':
      case 'BLOCKQUOTE':
      case 'BR':
        $this->Ln(5);
        break;
      case 'P':
        $this->Ln(10);
        break;
      case 'FONT':
        if (isset($attr['COLOR']) && $attr['COLOR'] != '') {
          $coul = hex2dec($attr['COLOR']);
          $this->SetTextColor($coul['R'], $coul['V'], $coul['B']);
          $this->issetcolor = true;
        }
        if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist)) {
          $this->SetFont(strtolower($attr['FACE']));
          $this->issetfont = true;
        }
        break;
    }
  }

  function CloseTag($tag) {
    //Closing tag
    if ($tag == 'STRONG')
      $tag = 'B';
    if ($tag == 'EM')
      $tag = 'I';
    if ($tag == 'B' || $tag == 'I' || $tag == 'U')
      $this->SetStyle($tag, false);
    if ($tag == 'A')
      $this->HREF = '';
    if ($tag == 'FONT') {
      if ($this->issetcolor == true) {
        $this->SetTextColor(0);
      }
      if ($this->issetfont) {
        $this->SetFont('arial');
        $this->issetfont = false;
      }
    }
  }

  function SetStyle($tag, $enable) {
    //Modify style and select corresponding font
    $this->$tag+=($enable ? 1 : -1);
    $style = '';
    foreach (array('B', 'I', 'U') as $s) {
      if ($this->$s > 0)
        $style.=$s;
    }
    $this->SetFont('', $style);
  }

  function PutLink($URL, $txt) {
    //Put a hyperlink
    $this->SetTextColor(0, 0, 255);
    $this->SetStyle('U', true);
    $this->Write(5, $txt, $URL);
    $this->SetStyle('U', false);
    $this->SetTextColor(0);
  }

// Page header
  function Header() {
    $xPos = $this->w / 4;

    // Logo
    $this->Image(WEBSITE_URL.'/wp-content/uploads/locations/header.png', $xPos, 6, 100);
     $this->SetFont('Arial','B',15);
     
     $PDF_TITLE = isset($_POST['pdf_nam']) ? $_POST['pdf_nam']:'';    
     $this->Ln(7);
     
    // Title
    
     // $this->Cell(30,10,$PDF_TITLE,1,0,'C');
     $this->SetTextColor(0,0,0);
     $this->SetDrawColor(192, 192, 192);     
     $this->Cell( 0, 9, $PDF_TITLE, 1, 1, 'C'); 
     
     
    // Line break
     $this->Ln(10);
  }

  function Footer() {

    $this->SetY(-18);
    $xPos = $this->w / 4;
    $this->Image(WEBSITE_URL.'/wp-content/uploads/locations/footer.png', $xPos, $this->h - 18, 110);
  }

  function SetCol($col) 
  {
    // Set position at a given column
    $this->col = $col;
    $x = 10 + $col * 65;
    $this->SetLeftMargin($x);
    $this->SetX($x);
  }

  function centreImage($img) 
  {
    list($width, $height) = $this->resizeToFit($img);
    
    // you will probably want to swap the width/height

    // around depending on the page's orientation
    
    $this->Image
    (
        $img, (self::A4_HEIGHT - $width) / 2, (self::A4_WIDTH - $height) / 2, $width, $height
    );
    
  }

}

//end of class



$pdf = new PDF_HTML();
$pdf->SetCompression(true);
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);
$pdf->AddPage();

$count = count($pdf_images);

// $pdf->Header();
$pdf->SetFont('Arial', 'B', 14);

$pdf->Ln(3);
$pdf->Cell(0, 9, iconv('UTF-8', 'windows-1252', html_entity_decode($PDF_CATEGORY_TITLE)), 0, 1, 'L' ); 
$pdf->Ln(10);

$jj = $pdf_images;
$file = explode(",", $jj);


$i = 1;
$j = 1;
$xpos = 10;
$ypos = 60;

$imageHeight = 90;
$imageWidth = 90;

foreach ($file as $image) 
{
  $size = getimagesize($image);
  if ($size) 
  {
    $maxWidth = $pdf->w;
    $attr = isset($size[3]) ? $size[3] : '';
    if ($attr != "") {

      $attr = explode(' ', $attr);
      $width = filter_var($attr[0], FILTER_SANITIZE_NUMBER_INT);
      $height = filter_var($attr[1], FILTER_SANITIZE_NUMBER_INT);
      
      $imageWidthInMM = $width / 2.55;
      $imageHeightInMM = $height / 2.55;
      
      $setWidth = $imageWidthInMM;
      $setHeight = $imageHeightInMM;
      
      if($width > $height)
      {
          if($imageWidthInMM > $imageWidth)
          {
              $setWidth = $imageWidth;              
          }          
          
          if($imageHeightInMM > $imageHeight)
          {
              $setHeight = $imageHeightInMM * $imageWidth / $imageWidthInMM;
          }
      }
      else
      {
          if($imageHeightInMM > $imageHeight)
          {
              $setHeight = $imageHeight;              
          }          
          
          if($imageWidthInMM > $imageWidth)
          {
              $setWidth = $imageWidthInMM * $imageHeight / $imageHeightInMM;
          }          
      }


      if ($imageWidthInMM > $maxWidth) 
      {
        $width = ($maxWidth * 2.55);
      }

      $pdf->image($image, $xpos, $ypos, $setWidth, $setHeight);      

      if ($i == 2) 
      {
        $i = 0;
        $ypos = $ypos + $imageHeight + 10;
        $xpos = 10;
      } 
      else 
      {
        $xpos = $xpos + $imageWidth + 10;
      }


      if ($j == 4) 
      {
        $pdf->AddPage();
        $j = 0;
        $i = 0;
        $xpos = 10;
        $ypos = 33;
      }


      $i++;
      $j++;
    }
  }
}


if ($theme_path) 
{
    
  $filename = md5(time()) . '.pdf';
  $filepath = $theme_path . '/generated_pdf/' . $filename;

  // mail('polina@neurlabs.com', 'PDF Created', $filepath);
  $pdf->Output($filepath, 'F');

  if ($WEBSITE_URL) 
  {
    $pdf_url = $WEBSITE_URL . '/wp-content/themes/image_locations_child/generated_pdf/' . $filename;
    
    $curl_url = WEBSITE_URL."/send_email.php";

    $query = "subject=PDF Created&to_email=".$EMAIL_TO."&cc_email=".$EMAIL_CC."&url=".$pdf_url;
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $curl_url);
    curl_setopt($curl_handle, CURLOPT_POST, 1);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $query);
    $mychdata = curl_exec($curl_handle);
    curl_close($curl_handle);        
  }

  $pdf->Output();
} 
else 
{
  $pdf->Output();
}


//echo $filepath;
//exit;
// $pdf->Footer();
?>