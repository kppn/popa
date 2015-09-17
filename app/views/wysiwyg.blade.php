                          <div id="content-container">
                            <div id="editor-wrapper">
                              <div id="formatting-container">
                              
                                <select title="Font" class="ql-font">
                                  <option value="sans-serif" selected               > Sans Serif</option>
                                  <option value="Georgia, serif"                    > Serif</option>
                                  <option value="Monaco, 'Courier New', monospace"  > Monospace</option>
                                  <option value="０７ラノベＰＯＰ"                  > ラノベＰＯＰ</option>
                                </select>
                                
                                <select title="Size" class="ql-size">
                                  <option value="10px"         >ちいさい </option>
                                  <option value="18px" selected>ふつう   </option>
                                  <option value="24px"         >おおきい </option>
                                  <option value="48px"         >デカ！   </option>
                                </select>
                                
                                <select title="Text Color" class="ql-color">
                                  <!-- 参考 http://www.colordic.org/w/ -->
                                  <option value="rgb(255, 255, 255)"         > <font color="#ffffff">  しろ   </font></option>
                                  <option value="rgb(  0,   0,   0)" selected> <font color="#000000">  黒     </font></option>
                                  <option value="rgb(255,   0,   0)"         > <font color="#ff0000">  赤     </font></option>
                                  <option value="rgb(  0,   0, 255)"         > <font color="#0000ff">  青     </font></option>
                                  <option value="rgb(  0, 255,   0)"         > <font color="#00ff00">  ライム </font></option>
                                  <option value="rgb(  0, 128, 128)"         > <font color="#008080">  深緑   </font></option>
                                  <option value="rgb(255,   0, 255)"         > <font color="#ff00ff">  赤紫   </font></option>
                                  <option value="rgb(255, 255,   0)"         > <font color="#ffff00">  黄     </font></option>
                                </select>
                                
                                <select title="Background Color" class="ql-background">
                                  <option value="rgb(255, 255, 255)" selected> <font color="#ffffff">  しろ   </font></option>
                                  <option value="rgb(0,     0,   0)"         > <font color="#000000">  黒     </font></option>
                                  <option value="rgb(255,   0,   0)"         > <font color="#ff0000">  赤     </font></option>
                                  <option value="rgb(0,     0, 255)"         > <font color="#0000ff">  青     </font></option>
                                  <option value="rgb(0,   255,   0)"         > <font color="#00ff00">  ライム </font></option>
                                  <option value="rgb(0,   128, 128)"         > <font color="#008080">  深緑   </font></option>
                                  <option value="rgb(255,   0, 255)"         > <font color="#ff00ff">  赤紫   </font></option>
                                  <option value="rgb(255, 255,   0)"         > <font color="#ffff00">  黄     </font></option>
                                </select>
                                
                                <select title="Text Alignment" class="ql-align">
                                  <option value="left" selected> ひだり         </option>
                                  <option value="center"       > 　まんなか     </option>
                                  <option value="right"        >　　 　　みぎ   </option>
                                  <!-- <option value="justify"      > Justify   </option> -->
                                </select>
                                
                                <button title="Bold" class="ql-format-button ql-bold">太く</button>
                                <button title="Italic" class="ql-format-button ql-italic">傾け</button>
                                <button title="Underline" class="ql-format-button ql-underline">下線</button>
                                <!-- <button title="Strikethrough" class="ql-format-button ql-strike">Strike</button> -->
                                <!-- <button title="Link" class="ql-format-button ql-link">Link</button> -->
                                <button title="Image" class="ql-format-button ql-image">絵を入れる</button>
                                <!-- <button title="Bullet" class="ql-format-button ql-bullet">Bullet</button> -->
                                <!-- <button title="List" class="ql-format-button ql-list">List</button> -->
                                
                              </div>
                              
                              <div id="editor-container"></div>
                              
                            </div>
                          </div>

                          <script type="text/javascript" src="../quill.js">
                          </script>
                          
                          <script type="text/javascript">
                            var editor = new Quill('#editor-container', {
                              modules: {
                                'toolbar': { container: '#formatting-container' },
                                'link-tooltip': true,
                                'image-tooltip': true,
                              },
                              // theme: 'snow',
                              // readOnly: true,
                              // formats: [ 'bold', 'italic', 'strike' ],    // elem: 'bold', 'italic', 'strike', 'underline', 'font', 'size', 'color', 'background', 'image', 'link', 'bullet', 'list', 'align'
                              // pollInterval: 100	// Number of milliseconds between checking for local changes in the editor.
                               styles: {		// Object containing CSS rules to add to the Quill editor. 
                                 'body': {		// ここを変えてもエディタ本文は変わらないので注意
                                   // 'font-family': "Arial",
                                   // 'font-size': "99px",
                                 },
                                 '.ql-editor': {	// ここを変えるとエディタ本文が変わるので注意
                                   // 'font-family': "'Arial', san-serif, 'MS Gothic'"
                                   // 'font-family': "Arial",
                                   // 'font-size': "99px",
                                 }
                               }
                            });
                            
                            
                            editor.on('selection-change', function(range) {
                              console.log('selection-change', range)
                            });
                            
                            editor.on('text-change', function(delta, source) {
                              console.log('text-change', delta, source);
                              //editorContainer.style.height = editor.root.ownerDocument.body.scrollHeight + 'px';
                            });
      
    </script>

