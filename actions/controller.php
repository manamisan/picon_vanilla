<?php

$app_name='picon_vanilla';

$mimes1 = ['jpg', 'jpe', 'jpeg', 'gif', 'png', 'pdf'];
$mimes2 = ['3G2', '3GP', 'AAI', 'AI', 'ART', 'ARW', 'AVI', 'AVS', 'BGR', 'BGRA', 'BGRO', 'BMP', 'BMP2', 'BMP3', 'BRF', 'CAL', 'CALS', 'CANVAS', 'CAPTION', 'CIN', 'CIP', 'CLIP', 'CMYK', 'CMYKA', 'CR2', 'CRW', 'CUR', 'CUT', 'DATA', 'DCM', 'DCR', 'DCX', 'DDS', 'DFONT', 'DNG', 'DOT', 'DPX', 'DXT1', 'DXT5', 'EPDF', 'EPI', 'EPS', 'EPS2', 'EPS3', 'EPSF', 'EPSI', 'EPT', 'EPT2', 'EPT3', 'ERF', 'EXR', 'FAX', 'FILE', 'FITS', 'FRACTAL', 'FTP', 'FTS', 'G3', 'G4', 'GIF', 'GIF87', 'GRADIENT', 'GRAY', 'GRAYA', 'GROUP4', 'GV', 'H', 'HALD', 'HDR', 'HISTOGRAM', 'HRZ', 'HTM', 'HTML', 'HTTP', 'HTTPS', 'ICB', 'ICO', 'ICON', 'IIQ', 'INFO', 'INLINE', 'IPL', 'ISOBRL', 'ISOBRL6', 'J2C', 'J2K', 'JNG', 'JNX', 'JP2', 'JPC', 'JPE', 'JPEG', 'JPG', 'JPM', 'JPS', 'JPT', 'JSON', 'K25', 'KDC', 'LABEL', 'M2V', 'M4V', 'MAC', 'MAGICK', 'MAP', 'MASK', 'MAT', 'MATTE', 'MEF', 'MIFF', 'MKV', 'MNG', 'MONO', 'MOV', 'MP4', 'MPC', 'MPEG', 'MPG', 'MRW', 'MSL', 'MSVG', 'MTV', 'MVG', 'NEF', 'NRW', 'NULL', 'ORF', 'OTB', 'OTF', 'PAL', 'PALM', 'PAM', 'PANGO', 'PATTERN', 'PBM', 'PCD', 'PCDS', 'PCL', 'PCT', 'PCX', 'PDB', 'PDF', 'PDFA', 'PEF', 'PES', 'PFA', 'PFB', 'PFM', 'PGM', 'PGX', 'PICON', 'PICT', 'PIX', 'PJPEG', 'PLASMA', 'PNG', 'PNG00', 'PNG24', 'PNG32', 'PNG48', 'PNG64', 'PNG8', 'PNM', 'PPM', 'PREVIEW', 'PS', 'PS2', 'PS3', 'PSB', 'PSD', 'PTIF', 'PWP', 'RADIAL-GRADIENT', 'RAF', 'RAS', 'RAW', 'RGB', 'RGBA', 'RGBO', 'RGF', 'RLA', 'RMF', 'RW2', 'SCR', 'SCT', 'SFW', 'SGI', 'SHTML', 'SIX', 'SIXEL', 'SPARSE-COLOR', 'SR2', 'SRF', 'STEGANO', 'SUN', 'SVG', 'SVGZ', 'TEXT', 'TGA', 'THUMBNAIL', 'TIFF', 'TIFF64', 'TILE', 'TIM', 'TTC', 'TTF', 'TXT', 'UBRL', 'UBRL6', 'UIL', 'UYVY', 'VDA', 'VICAR', 'VID', 'VIFF', 'VIPS', 'VST', 'WBMP', 'WMF', 'WMV', 'WMZ', 'WPG', 'X', 'X3F', 'XBM', 'XC', 'XCF', 'XPM', 'XPS', 'XV', 'XWD', 'YCbCr', 'YCbCrA', 'YUV'];

$mimes = ['eps', 'gif', 'jpg', 'png', 'pdf','tif'];

if (isset($_POST['resolution'])) {
  $resolution = $_POST['resolution'];
  // （3）formタグで送信したfile情報はここに表示
  $name = $_FILES['picture']['name'];
  $ext = substr($name, strripos($name, '.') + 1);
  $name = basename($name, '.' . $ext);

  $tmp_name = $_FILES['picture']['tmp_name'];
  // var_dump($name);

  $imagick = new Imagick();
  $imagick->setOption('density', $resolution);

  if ($ext == 'pdf' || $ext == 'tif' || $ext == 'tiff') {

    $imagick->readImage($tmp_name);
    $page_num = $imagick->getimagescene()+1; // ページ数を取得

    // echo '<br>';
    // var_dump($page_num);

    $page=$_POST['page'];
    $tmp_name .= '[' . ($page-1) . ']';
  }
  // echo $ext;
  // echo $tmp_name;

  foreach ($mimes as $mime) {
    if (isset($_POST['into_' . $mime])) {
      
      if ($ext == 'pdf' || $ext == 'tif'|| $ext == 'tiff'){
        $new_name = $name . "[" . $page . "]" . '.' . $mime;

        if ($page <= $page_num) {
          
          $imagick->readImage($tmp_name);
          $imagick = $imagick->flattenImages();
          $imagick->writeImages($_SERVER['DOCUMENT_ROOT'] .'/' . $app_name . '/assets/images/' . $new_name, false);

        }else {
          $error = 1;
        }
      }else{

        $imagick->readImage($tmp_name);
        $new_name = $name . '.' . $mime;
        $imagick->writeImages($_SERVER['DOCUMENT_ROOT'] . '/' . $app_name . '/assets/images/' . $new_name, false);
      }
    }
  }
}

?>