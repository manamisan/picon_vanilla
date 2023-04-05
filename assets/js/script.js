$(() => {

  $('#media').on('change', function (e) {

    if ($('#previewMedia') != null) {
      $('#previewMedia').remove();
    }
    // 1枚だけ表示する
    var file = e.target.files[0];

    console.log(file.name);

    // ファイルのブラウザ上でのURLを取得する
    var blobUrl = window.URL.createObjectURL(file);

    console.log(blobUrl);
    // img要素に表示
    if (file.name.match(/.*?\.mp4/i)) {

      createPreviewVideo(blobUrl);
      console.log(file.name);

    } else if (file.name.match(/.*?\.pdf/i)) {

      createPreviewPDF(blobUrl);
      $('#convert').css('display', 'flex');
      $('#pdf_page').css('display', 'flex');

      console.log(file);

    } else if (file.name.match(/.*?\.tif/i) || file.name.match(/.*?\.tiff/i)) {

      // createPreviewPDF(blobUrl);
      $('#convert').css('display', 'flex');
      $('#pdf_page').css('display', 'flex');
      $('#preview').append('<p class="h6">.tff files can\'t be displayed on browsers</p>');

      console.log(file);

    } else {

      createPreviewImage(blobUrl);
      // console.log(file.name);
      $('#convert').css('display', 'flex');
      console.log(file.name + 'aaa');
      $('#pdf_page').css('display', 'none');

    }
  });

  function createPreviewVideo(url) {
    $('#preview').append('<video id="previewMedia" controls autoplay><source type="video/mp4"></video>');
    $('#previewMedia').children('source').attr('src', url);
  }

  function createPreviewImage(url) {
    $('#preview').append('<img>');
    $('#preview').children('img').attr('id', 'previewMedia').css('width', '30%');
    $('#previewMedia').attr('src', url);
  }

  function createPreviewPDF(url) {
    $('#preview').append('<iframe>');
    $('#preview').children('iframe').attr('id', 'previewMedia').css('width', '60%').attr('height', '400vh');
    $('#previewMedia').attr('src', url);
  }
  //end of truncate

  $('.files').change(function (e) {

    // ファイル情報を取得
    var fileData = e.target.files[0];

    //サムネイル表示エリアのエレメント取得
    var object = $(this).parent().children('object').get(0);

    // FileReaderオブジェクトを使ってファイル読み込み
    var reader = new FileReader();
    // ファイル読取り成功時処理
    reader.onload = function () {

      //ノードの複製
      var cln = object.cloneNode(true);

      //複製したノードのdata要素をにFileAPIの読み込み結果をセット
      cln.setAttribute("data", reader.result);

      object.parentNode.replaceChild(cln, object);
    }
    // ファイル読み込みを実行
    reader.readAsDataURL(fileData);
  });
});