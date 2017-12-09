<!-- 基礎 plupload 引用 -->
<script type="text/javascript" src="plugin/plupload/js/plupload.full.min.js"></script>

<!-- html -->
<h1>Custom example</h1>
最基本可用
<div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
<br />
<div id="container">
    <a id="pickfiles" href="javascript:;">[Select files]</a>
    <a id="uploadfiles" href="javascript:;">[Upload files]</a>
</div>

<br />
<pre id="console"></pre>

<!-- script -->
<script type="text/javascript">
var pluploadDir = 'pic/';
var pluploadFilesRemaining = 0;
var uploader = new plupload.Uploader({
        runtimes : 'html5,flash,silverlight,browserplus,html4',  // 使用何種技術引擎，可使用flash,html5等
        drop_element: 'pickfiles', // 拖拉區域上傳的ID
        browse_button : 'pickfiles', // 觸發上傳按鈕的ID
        container: document.getElementById('container'), // ... or DOM Element itself
        url : 'new_upload_end2.php',// 服務端程式接收路徑
        flash_swf_url : pluploadDir + 'Moxie.swf',
        silverlight_xap_url : pluploadDir + 'Moxie.xap',
        //multi_selection:false,     // 一次只能上傳一個或是可多個
        chunk_size : '2mb',  // 上傳分塊每塊的大小，這個值小於服務器最大上傳限制的值即可(文件總大小/chunk_size = 分塊數)
        //chunk_size : '10kb',  // 上傳分塊每塊的大小，這個值小於服務器最大上傳限制的值即可(文件總大小/chunk_size = 分塊數)
        resize : {width : 5200, height : 5400, quality : 90},  // 是否生成縮略圖（僅對JPG圖片文件有效）
        filters : {
                webgolds: 'types',
                max_file_size : '2mb', // 文件上傳最大限制
                mime_types: [
                        {title : "Image files", extensions : "jpg,gif,png"}/*,
                        {title : "Zip files", extensions : "zip"}*/
                ]
        },
        init: {
                PostInit: function() {
                        document.getElementById('filelist').innerHTML = '';
                        document.getElementById('uploadfiles').onclick = function() {
                                uploader.start();
                                return false;
                        };
                },
                FilesAdded: function(up, files) {
                        plupload.each(files, function(file) {
                                document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                        });
                },
                UploadProgress: function(up, file) {
                        document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
                },
                Error: function(up, err) {
                        document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
                }
        }
});

//佇列改變事件
uploader.bind('QueueChanged', function(up, files) {
    pluploadFilesRemaining = uploader.files.length;
});

//上傳完成事件
uploader.bind('FileUploaded', function(up, file, data) {
  pluploadFilesRemaining--;
  console.log(data);
  console.log('檔案上傳成功。');
});

uploader.init();
</script>