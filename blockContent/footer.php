 <script>
     if (document.querySelector('#edit') !== null) {
         document.querySelector('#post-content').setAttribute('id', 'editorJS');
         document.querySelector('#editorJS').insertAdjacentHTML('beforebegin', `<div id="editorjs"></div><a href='https://ko-fi.com/I3I2RHQZS' target='_blank'><img height='36' style='border:0px;height:36px; display:block;margin-left:auto;margin-right:0;margin-top:20px;' src='https://storage.ko-fi.com/cdn/kofi3.png?v=3' border='0' alt='Buy Me a Coffee at ko-fi.com' /></a>`);
         document.querySelector('#editorJS').style.display = 'none';







         var editor = new EditorJS({


             onReady: () => {
                 new Undo({
                     editor
                 });
                 new DragDrop(editor);
             },


             onChange: (api, event) => {
                 saveData()
             },

             /** 
              * Id of Element that should contain the Editor 
              */
             holder: 'editorjs',

             tools: {


                 raw: RawTool,

                 style: EditorJSStyle.StyleInlineTool,

                 header: {
                     class: Header,
                     config: {
                         placeholder: 'Enter a header',
                         levels: [1, 2, 3, 4, 5],
                         defaultLevel: 3,
                         defaultAlignment: 'left'
                     }
                 },
                 paragraph: {
                     class: Paragraph,
                     inlineToolbar: true,
                 },

                 list: {
                     class: List,
                     inlineToolbar: true,
                     config: {
                         defaultStyle: 'unordered'
                     }
                 },


                 table: {
                     class: Table,
                     inlineToolbar: true,
                     config: {
                         rows: 2,
                         cols: 3,
                     },
                 },

                 code: CodeTool,


                 Marker: {
                     class: Marker,
                     shortcut: 'CMD+SHIFT+M',
                 },

                 inlineCode: {
                     class: InlineCode,
                     shortcut: 'CMD+SHIFT+M',
                 },

                 tooltip: {
                     class: Tooltip,
                     config: {
                         location: 'left',
                         highlightColor: '#FFEFD5',
                         underline: true,
                         backgroundColor: '#154360',
                         textColor: '#FDFEFE',
                         holder: 'editorId',
                     }
                 },


                 image: {
                     class: ImageTool,
                     config: {
                         uploader: {
                             uploadByFile(file) {
                                 // Implement your image upload logic using PHP here
                                 // You might want to use AJAX to send the file to the server
                                 // and get the URL back
                                 return new Promise((resolve, reject) => {
                                     // Your PHP upload script should handle the file and return the image URL
                                     const formData = new FormData();
                                     formData.append('image', file);

                                     fetch('<?php global $SITEURL; echo $SITEURL;?>plugins/blockContent/upload/upload.php', {
                                             method: 'POST',
                                             body: formData,
                                         })
                                         .then(response => response.json())
                                         .then(data => {
                                             if (data.success) {
                                                 resolve({
                                                     success: 1,
                                                     file: {
                                                         url: data.url
                                                     }
                                                 });
                                             } else {
                                                 reject({
                                                     error: {
                                                         message: data.error.message
                                                     }
                                                 });
                                             }
                                         })
                                         .catch(error => {
                                             reject({
                                                 error: {
                                                     message: 'Network error'
                                                 }
                                             });
                                         });
                                 });
                             },
                         },
                     },
                 },


                 columns: {
                     class: editorjsColumns,
                     config: {
                         tools: {
                             style: EditorJSStyle.StyleInlineTool,

                             header: {
                                 class: Header,
                                 config: {
                                     placeholder: 'Enter a header',
                                     levels: [1, 2, 3, 4, 5],
                                     defaultLevel: 3,
                                     defaultAlignment: 'left'
                                 }
                             },
                             paragraph: {
                                 class: Paragraph,
                                 inlineToolbar: true,
                             },




                             table: {
                                 class: Table,
                                 inlineToolbar: true,
                                 config: {
                                     rows: 2,
                                     cols: 3,
                                 },
                             },


                             Marker: {
                                 class: Marker,
                                 shortcut: 'CMD+SHIFT+M',
                             },

                             inlineCode: {
                                 class: InlineCode,
                                 shortcut: 'CMD+SHIFT+M',
                             },

                             tooltip: {
                                 class: Tooltip,
                                 config: {
                                     location: 'left',
                                     highlightColor: '#FFEFD5',
                                     underline: true,
                                     backgroundColor: '#154360',
                                     textColor: '#FDFEFE',
                                     holder: 'editorId',
                                 }
                             },


                             image: {
                                 class: ImageTool,
                                 config: {
                                     uploader: {
                                         uploadByFile(file) {
                                             // Implement your image upload logic using PHP here
                                             // You might want to use AJAX to send the file to the server
                                             // and get the URL back
                                             return new Promise((resolve, reject) => {
                                                 // Your PHP upload script should handle the file and return the image URL
                                                 const formData = new FormData();
                                                 formData.append('image', file);

                                                 fetch('<?php global $SITEURL; echo $SITEURL;?>plugins/blockContent/upload/upload.php', {
                                                         method: 'POST',
                                                         body: formData,
                                                     })
                                                     .then(response => response.json())
                                                     .then(data => {
                                                         if (data.success) {
                                                             resolve({
                                                                 success: 1,
                                                                 file: {
                                                                     url: data.url
                                                                 }
                                                             });
                                                         } else {
                                                             reject({
                                                                 error: {
                                                                     message: data.error.message
                                                                 }
                                                             });
                                                         }
                                                     })
                                                     .catch(error => {
                                                         reject({
                                                             error: {
                                                                 message: 'Network error'
                                                             }
                                                         });
                                                     });
                                             });
                                         },
                                     },
                                 },
                                 
                             },

                         },
                         EditorJsLibrary: EditorJS //ref EditorJS - This means only one global thing
                     }
                 },




             },

         });


         async function saveData() {
             try {
                 const savedData = await editor.save();
                 console.log(editor.save());
                 const html = convertToHTML(savedData);
                 document.getElementById('editorJS').value = html;
             } catch (error) {
                 console.error('Error saving data:', error);
             }
         }

         function convertToHTML(savedData) {
             return savedData.blocks.map(block => {
                 switch (block.type) {
                     case 'paragraph':
                         return `<p style="text-align:${block.data.alignment}">${block.data.text}</p>`;

                     case 'raw':
                         return `<div class="rawdata">${block.data.html}</div>`;

                     case 'columns':
                         let col2 = '<div class="row">';


                         block.data.cols.forEach((x, i) => {

                             col2 += `<div class="col">`;

                             block.data.cols[i]['blocks'].forEach(c => {

                                 if (c.type == 'paragraph') {
                                     col2 += `<p style="text-align:${c.data.alignment}">${c.data.text}</p>`;
                                 } else if (c.type == 'raw') {
                                     col2 += `<div class="rawdata">${c.data.html}</div>`;
                                 } else if (c.type == 'header') {
                                     col2 += `<h${c.data.level} style="text-align:${c.data.alignment}">${c.data.text}</h${c.data.level}>`;
                                 } else if (c.type == 'list') {
                                     col2 += `<${c.data.style === 'ordered' ? 'ol' : 'ul'}>${c.data.items.map(item => `<li>${item}</li>`).join('')}</${c.data.style === 'ordered' ? 'ol' : 'ul'}>`;
                                 } else if (c.type == 'image') {

                                     const classes = [
                                         c.data.file.stretched ? 'stretched' : '',
                                         c.data.file.withBackground ? 'with-background' : '',
                                         c.data.file.withBorder ? 'with-border' : '',
                                     ].filter(Boolean).join(' ');

                                     col2 += `<img src="${c.data.file.url}"  alt="${c.data.file.caption || ''}" class="${classes}" >`;


                                 } else if (c.type == 'table') {

                                     col2 += `<table>${c.data.file.content.map(row => `<tr>${row.map(cell => `<td>${cell}</td>`).join('')}</tr>`).join('')}</table>`;

                                 } else if (c.type == 'code') {
                                     col2 += `<pre><code>${c.data.file.code}</code></pre>`;
                                 };

                             });

                             col2 += `</div>`;

                         });


                         col2 += `</div>`;

                         return col2;


                     case 'header':
                         return `<h${block.data.level} style="text-align:${block.data.alignment}">${block.data.text}</h${block.data.level}>`;

                     case 'list':
                         return `<${block.data.style === 'ordered' ? 'ol' : 'ul'}>${block.data.items.map(item => `<li>${item}</li>`).join('')}</${block.data.style === 'ordered' ? 'ol' : 'ul'}>`;

                     case 'image':
                         const classes = [
                             block.data.file.stretched ? 'stretched' : '',
                             block.data.file.withBackground ? 'with-background' : '',
                             block.data.file.withBorder ? 'with-border' : '',
                         ].filter(Boolean).join(' ');

                         return `<img src="${block.data.file.url}"  alt="${block.data.file.caption || ''}" class="${classes}" >`;

                     case 'table':
                         return `<table>${block.data.content.map(row => `<tr>${row.map(cell => `<td>${cell}</td>`).join('')}</tr>`).join('')}</table>`;

                     case 'code':
                         return `<pre><code>${block.data.file.code}</code></pre>`;

                         // Add cases for other block types as needed
                     default:
                         return '';
                 }
             }).join('');
         }

         function convertFromHTML(html) {
             const parser = new DOMParser();
             const doc = parser.parseFromString(html, 'text/html');

             const blocks = [];

             doc.body.childNodes.forEach(node => {
                 if (node.nodeType === Node.ELEMENT_NODE) {
                     const blockType = determineBlockType(node);
                     const blockData = extractBlockData(node, blockType);

                     blocks.push({
                         type: blockType,
                         data: blockData,
                     });
                 }
             });

             return {
                 blocks
             };
         }

         function determineBlockType(node) {
             switch (node.tagName.toLowerCase()) {
                 case 'p':
                     return 'paragraph';

                 case 'h1':
                 case 'h2':
                 case 'h3':
                 case 'h4':
                 case 'h5':
                 case 'h6':
                     return 'header';

                 case 'ul':
                 case 'ol':
                     return 'list';



                 case 'div':
                     // Check for specific classes and return 'raw' accordingly
                     if (node.className.includes('row')) {
                         return 'columns';
                     } else {
                         return 'raw';
                     };



                 case 'li':
                     // Check if the parent is a ul or ol
                     return node.parentNode.tagName.toLowerCase() === 'ul' ? 'list' : 'list';

                 case 'img':
                     return 'image';

                 case 'table':
                     return 'table';

                 case 'pre':
                     // Check if it's a code block or inline code
                     return node.querySelector('code') ? 'code' : 'paragraph';

                 default:
                     return 'paragraph'; // Default to paragraph for unrecognized elements
             }
         }

         function extractBlockData(node, blockType) {
             switch (blockType) {
                 case 'paragraph':
                     return {
                         text: node.innerHTML,
                     };

                 case 'header':
                     return {
                         text: node.innerHTML,
                             level: parseInt(node.tagName.charAt(1))
                     };

                 case 'raw':
                     return {
                         html: node.innerHTML,
                     };

                 case 'columns':
                     return {

                         cols: node.querySelectorAll('div').length == 2 ? [convertFromHTML(node.querySelectorAll('div')[0].innerHTML), convertFromHTML(node.querySelectorAll('div')[1].innerHTML)] : [convertFromHTML(node.querySelectorAll('div')[0].innerHTML), convertFromHTML(node.querySelectorAll('div')[1].innerHTML), convertFromHTML(node.querySelectorAll('div')[2].innerHTML)],



                     };


                 case 'list':
                     return {
                         style: node.tagName.toLowerCase() === 'ol' ? 'ordered' : 'unordered',
                             items: Array.from(node.childNodes).map(item => item.textContent.trim())
                     };

                 case 'image':
                     return {
                         file: {
                             url: node.getAttribute('src'),
                             caption: node.getAttribute('alt'),
                             withBackground: node.classList.contains('with-background'),
                             withBorder: node.classList.contains('with-border'),
                             stretched: node.classList.contains('stretched')
                         }
                     };

                 case 'table':
                     const rows = Array.from(node.querySelectorAll('tr')).map(row =>
                         Array.from(row.querySelectorAll('td')).map(cell => cell.textContent.trim())
                     );
                     return {
                         content: rows
                     };

                 case 'code':
                     return {
                         code: node.querySelector('code').textContent.trim()
                     };

                 default:
                     return {};
             }
         }


         if (document.querySelector('#editorJS').value !== '') {
             editor.isReady
                 .then(() => {
                     editor.blocks.render(convertFromHTML(document.querySelector('#editorJS').value));
                 });
         };




     };
 </script>