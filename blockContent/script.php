<?php global $SITEURL; ?>

<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/editorjs.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/bundle.min.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/paragraph-bundle.min.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/list.umd.min.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/image.umd.min.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/table.umd.min.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/code.umd.min.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/marker.umd.min.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/inline-code.umd.min.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/editorjs-tooltip.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/text-variant-tune.min.js"></script>
<link rel="stylesheet" href="<?php echo $SITEURL; ?>plugins/blockContent/js/index.min.css">
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/editorjs-drag-drop.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/editorjs-undo.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/editorjs-style.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/simple-image.umd.min.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/raw.umd.min.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/editorjs-paragraph-linebreakable.bundle.min.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/editorjs-layout.js"></script>
<script src="<?php echo $SITEURL; ?>plugins/blockContent/js/simple-image-editorjs.js"></script>

<style>
    .codex-editor {
        background: #fff;
        border: solid 1px #ddd;
        padding: 10px !important;

    }

    .codex-editor__redactor {
        padding-bottom: 100px !important;
    }

    .ce-editorjsColumns_col {
        flex: 50%
    }

    .ce-editorjsColumns_wrapper {
        display: flex;
        width: 100%;
        gap: 10px;
        margin-bottom: 10px;
        flex-direction: row
    }

    .ce-editorjsColumns_wrapper .ce-toolbar__actions {
        z-index: 0
    }

    .ce-editorjsColumns_wrapper .ce-toolbar {
        z-index: 4
    }

    .ce-editorjsColumns_wrapper .ce-popover {
        z-index: 4000
    }

    @media(max-width: 800px) {
        .ce-editorjsColumns_wrapper {
            flex-direction: column;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px
        }
    }

    .ce-inline-toolbar {
        z-index: 1000
    }

    .ce-block__content,
    .ce-toolbar__content {
        max-width: calc(100% - 50px)
    }


    .codex-editor--narrow .codex-editor__redactor {
        margin: 0
    }

    .ce-toolbar {
        z-index: 4
    }

    .codex-editor {
        border: none;
        max-width: 90%;
        margin: 0 auto;
        z-index: auto !important
    }

    :not(dialog) .codex-editor {

        max-width: 95%;
        padding: 100;

    }



    dialog {
        height: 50vh;
    }

    dialog .codex-editor {
        max-width: 85% !important;
        margin: 0 auto;
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