<?php
if (isset($_GET['new_name'])) {

  header('Content-Type:'.($_GET['ext']!='pdf' ?'image/'.$_GET['ext'] : 'application/pdf'));
  // header('Content-Type: image/png');
  header('Content-Length: ../assets/images/'.$_GET['new_name']);
  header('Content-Disposition:attachment;filename = "'.$_GET['new_name'].'"');
  // ファイルの大きさを明示
  // ファイルを出力
  echo file_get_contents('../assets/images/' . $_GET['new_name']);

  // header('Content-Type: image/png');
  // header('Content-Length: ../dltest.png');
  // header('Content-Disposition:attachment;filename = "../dltest.png"');
  // // ファイルの大きさを明示
  // // ファイルを出力
  // echo file_get_contents('../dltest.png');

  // header('Content-Type: image/png');
  // header('Content-Length: ' . filesize('../dltest.png'));
  // header('Content-Disposition: attachment; filename="dltest.png"');
  // echo file_get_contents('../dltest.png');

  exit;
}
?>