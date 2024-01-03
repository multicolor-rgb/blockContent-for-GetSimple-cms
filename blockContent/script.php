<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/editorjs-header-with-alignment@1.0.1/dist/bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/editorjs-paragraph-with-alignment@3.0.0/dist/bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@1.9.0/dist/list.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/image@2.9.0/dist/image.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/table@2.3.0/dist/table.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/code@2.9.0/dist/code.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@1.4.0/dist/marker.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@1.5.0/dist/inline-code.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/editorjs-tooltip"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/text-variant-tune@1.0.1/dist/text-variant-tune.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@editorjs/text-variant-tune@1.0.1/src/styles/index.min.css">
<script src="https://cdn.jsdelivr.net/npm/editorjs-drag-drop"></script>
<script src="https://cdn.jsdelivr.net/npm/editorjs-undo"></script>
<script src="https://cdn.jsdelivr.net/npm/editorjs-style@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@1.6.0/dist/simple-image.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/raw@2.5.0/dist/raw.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@calumk/editorjs-columns@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@calumk/editorjs-paragraph-linebreakable@1.0.0/dist/editorjs-paragraph-linebreakable.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-image-editorjs@latest"></script>

<style>
    .codex-editor {
        background: #fff;
        border: solid 1px #ddd;
        padding: 10px !important;

    }

    .codex-editor__redactor {
        padding-bottom: 100px !important;
    }
</style>

<link rel="stylesheet" href="<?php global $SITEURL;
                                echo $SITEURL . 'plugins/blockContent/css/editor.min.css'; ?>">


<?php

global $HTMLEDITOR;


if ($HTMLEDITOR != '') {
    echo  '<div class="alerteditor" style=" text-transform:uppercase;font-size:13px;border-radius-left-top:5px;background:red;color:#fff;padding:10px;text-align:center;font-weight:bold;position:fixed;bottom:0;right:0;">DISABLE the HTML editor ON SETTINGS if you want use blockContent! </div>';
}


?>