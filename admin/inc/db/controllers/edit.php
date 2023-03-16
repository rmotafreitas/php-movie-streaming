<script>
    var drops = [];
</script>

<?php

$strKey = '';
foreach ($_GET as $k => $v) {
    if ($k != 'table') {
        $strKey .= "$k = '$v' AND ";
    }
}
$strKey = substr($strKey, 0, strlen($strKey) - 5);

// ----------------------------
// QUERY editar
// ----------------------------
$query  = "SELECT * FROM " . $arrModel['table'] . " WHERE $strKey";
$res    = my_query($query);

function writeFieldForm($cfg, $dataField, $fieldName, $fieldValue = '')
{
    $strReturn = '';
    switch ($dataField['type']) {
        case 'textbox':
            $strReturn .= '<div class="form-group">
            <label> ' . $dataField['label'] . '</label><input class="form-control" value="' . $fieldValue . '" name="' . $fieldName . '" required="required"/>
            </div>';
            break;

        case 'number':
            $min = isset($dataField['min']) ? $dataField['min'] : '';
            $max = isset($dataField['max']) ? $dataField['max'] : '';
            $step = isset($dataField['step']) ? $dataField['step'] : '';
            $strReturn .= '<div class="form-group">
            <label> ' . $dataField['label'] . '</label><input class="form-control" value="' . $fieldValue . '" step="' . $step . '" min="' . $min . '" max="' . $max . '" name="' . $fieldName . '" type="number" required="required"/>
            </div>';
            break;

        case 'password':
            $strReturn .= '<div class="form-group">
            <label> ' . $dataField['label'] . '</label><input class="form-control" name="' . $fieldName . '" type="password" required="required"/>
            </div>';
            break;

        case 'active':
            $checked = ($fieldValue == 1) ? 'checked="checked"' : '';
            $strReturn .= '<div class="form-check">
            <label><input class="form-check-input" type="checkbox" ' . $checked . ' name="' . $fieldName . '">' . $dataField['label'] . '</label>
            </div>';
            break;

        case 'time':
            $strReturn .= '<div class="form-group">
            <label> ' . $dataField['label'] . '</label><input class="form-control" value="' . $fieldValue . '" placeholder="00:00:00" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]" name="' . $fieldName . '" type="text"/>
            </div>';
            break;

        case 'color':
            $strReturn .= '<div class="form-group">
                <label> ' . $dataField['label'] . '</label><input class="form-control"  value="' . $fieldValue . '" name="' . $fieldName . '" type="color" required="required"/>
                </div>';
            break;

        case 'select':
            $strReturn .=  '<div class="form-group">
            <label> ' . $dataField['label'] . '</label><select name="' . $fieldName . '" class="form-control">';
            $arrSelect = array();
            if (isset($dataField['select_options'])) {
                $arrSelect = $dataField['select_options'];
                foreach ($arrSelect as $k => $v) {
                    if ($v['key'] == $fieldValue) {
                        $strReturn .= '<option required="required" selected="true" value="' . $v['key'] . '">' . $v['label'] . '</option>';
                    } else {
                        $strReturn .= '<option required="required" value="' . $v['key'] . '">' . $v['label'] . '</option>';
                    }
                }
            } else {
                $strSelectKey = (isset($dataField['select_table']['filter']) ? $dataField['select_table']['filter'] : '1=1');
                $query  = "SELECT * FROM " . $dataField['select_table']['table'] . " WHERE $strSelectKey";
                $resSelect = my_query($query);
                foreach ($resSelect as $k => $v) {
                    $arrSelect[$k] = $v;
                }
                if (!isset($dataField['select_table']['default']) || !$dataField['select_table']['default']) {
                    $strReturn .= '<option value="0" selected="true">-------------</option>';
                }
                $key = getModelKey($cfg, $dataField['select_table']['table']);
                foreach ($arrSelect as $k => $v) {
                    if ($v[$key] == $fieldValue) {
                        $strReturn .= '<option selected="true" value="' . $v[$key] . '">' . $v[$dataField['select_table']['field']] . '</option>';
                    } else {
                        $strReturn .= '<option value="' . $v[$key] . '">' . $v[$dataField['select_table']['field']] . '</option>';
                    }
                }
            }
            $strReturn .= '</select></div>';
            break;

        case 'ckeditor':
            $strReturn .= '<div class="form-group">
            <label> ' . $dataField['label'] . '</label><textarea cols="80" id="ckeditor1" name="' . $fieldName . '" rows="10">' . $fieldValue . '</textarea>
            </div>';
            break;

        case 'multiselect':
            $strReturn .= '<div class="form-group"><label> ' . $dataField['label'] . '</label><select id="' . $fieldName . '" name="' . $fieldName . '" class="form-control select2" multiple="true">';

            $arrSelect = array();

            $strSelectKey = (isset($dataField['select_table']['filter']) ? $dataField['select_table']['filter'] : '1=1');
            $query  = "SELECT * FROM " . $dataField['select_table']['table'] . " WHERE $strSelectKey";
            $resSelect = my_query($query);
            foreach ($resSelect as $k => $v) {
                $arrSelect[$k] = $v;
            }
            $key = getModelKey($cfg, $dataField['select_table']['table']);
            $arrSelecteds = explode(',', $fieldValue);
            foreach ($arrSelect as $k => $v) {
                $selected = (in_array($v[$key], $arrSelecteds)) ? 'selected="true"' : '';
                $strReturn .= '<option ' . $selected . ' value="' . $v[$key] . '">' . $v[$dataField['select_table']['field']] . '</option>';
            }

            $strReturn .= '</select></div>';

            break;

        case 'file':
            $maxFiles = isset($dataField['max_files']) ? $dataField['max_files'] : 1;
            $min = isset($dataField['min']) ? $dataField['min'] : 0;
            $maxFilesize = isset($dataField['max_filesize']) ? $dataField['max_filesize'] : 256;
            $acceptFiles = isset($dataField['accept_files']) ? implode(',', $dataField['accept_files']) : "null";
            $width = isset($dataField['width']) ? $dataField['width'] : 0;
            $height = isset($dataField['height']) ? $dataField['height'] : 0;

            $arrImgs = explode(',', $fieldValue);

            $strReturn .= '<div class="form-group"><label> ' . $dataField['label'] . '</label>
            <div action="' . $cfg['urls']['admin'] . '/inc/db/handlers/uploadDrops.php?folder=' . $dataField['folder'] . '&width=' . $width . '&height=' . $height . '" class="dropzone" name="' . $fieldName . '" id="input' . $fieldName . '">
                  <div class="dz-message">
                    <div>
                      <h4>Coloque aqui o(s) respetivo(s) ficheiro(s)</h4>
                    </div>
                  </div>
                </div>
            </div>
            <script>
            let dropzone' . $fieldName . ' = new Dropzone("#input' . $fieldName . '", {
                name: "' . $fieldName . '",
                label: "' . $dataField['label'] . '",
                maxFiles: ' . $maxFiles . ',
                maxFilesize: ' . $maxFilesize . ',
                acceptedFiles: "' . $acceptFiles . '",
                min: "' . $min . '",
                myFiles: {},
                addRemoveLinks: true,
                autoProcessQueue: false,
                dictMaxFilesExceeded: "O limite de ficheiros já foi atingido",
                renameFile: function(file) {
                    let ext = getExtension(file.name);
                    let r = (Math.random() + 1).toString(36).substring(7);
                    let newName = "' . $dataField['folder'] . '_" + r + "." + ext;
                    return newName;
                },
                init() {
                    let arrImgs = ' . json_encode($arrImgs) . ';
                    if (arrImgs[0] != 0) {
                        for (let i = 0; i < arrImgs.length; i++) {
                            let mockFile = { name: arrImgs[i], size: 12345 };
                            //this.emit("addedfile", mockFile);
                            //this.emit("thumbnail", mockFile, "' . $cfg['urls']['uploads'] . '/' . $dataField['folder'] . '/" + arrImgs[i]);                
                            //this.emit("complete", mockFile);                            
                            this.displayExistingFile(mockFile, "' . $cfg['urls']['uploads'] . '/' . $dataField['folder'] . '/" + arrImgs[i]);
                            
                        }
                        $("#formInserir").append("<input type=\"hidden\" name=\"' . $fieldName . '\" value=\"' . $fieldValue . '\">");
                    } else {
                        $("#formInserir").append("<input type=\"hidden\" name=\"' . $fieldName . '\" value=\"\">");
                    }   
             
                    this.on("complete", () =>{
                     
                             $("#saveData").click();                        
                   
                        
                    })
                    
                    

                },
                addedfile(file) {
                    if (file["upload"] === undefined) {
                        this.options.myFiles[file.name] = true;
                    } else {
                        console.log(file.upload.filename);
                        this.options.myFiles[file.upload.filename] = true;
                        
                    }
                    this.options.maxFiles = ' . $maxFiles . ' - (Object.keys(this.options.myFiles).length - this.files.length) ;
                    
console.log(this.options.maxFiles);
console.log("V:" + Object.keys(this.options.myFiles).length);
console.log(this.files.length);
                    console.log("added " + this.options.maxFiles);
                    console.log(this.options.myFiles);
                    if (this.element === this.previewsContainer) {
                      this.element.classList.add("dz-started");
                    }
                
                    if (this.previewsContainer && !this.options.disablePreviews) {
                      file.previewElement = Dropzone.createElement(
                        this.options.previewTemplate.trim()
                      );
                      file.previewTemplate = file.previewElement; // Backwards compatibility
                
                      this.previewsContainer.appendChild(file.previewElement);
                      for (var node of file.previewElement.querySelectorAll("[data-dz-name]")) {
                        node.textContent = file.name;
                      }
                      for (node of file.previewElement.querySelectorAll("[data-dz-size]")) {
                        node.innerHTML = this.filesize(file.size);
                      }
                
                      if (this.options.addRemoveLinks) {
                        file._removeLink = Dropzone.createElement(
                          `<a class="dz-remove" href="javascript:undefined;" data-dz-remove>${this.options.dictRemoveFile}</a>`
                        );
                        file.previewElement.appendChild(file._removeLink);
                      }
                
                      let removeFileEvent = (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        if (file.status === Dropzone.UPLOADING) {
                          return Dropzone.confirm(
                            this.options.dictCancelUploadConfirmation,
                            () => this.removeFile(file)
                          );
                        } else {
                          if (this.options.dictRemoveFileConfirmation) {
                            return Dropzone.confirm(
                              this.options.dictRemoveFileConfirmation,
                              () => this.removeFile(file)
                            );
                          } else {
                            return this.removeFile(file);
                          }
                        }
                      };
                
                      for (let removeLink of file.previewElement.querySelectorAll(
                        "[data-dz-remove]"
                      )) {
                        removeLink.addEventListener("click", removeFileEvent);
                      }
                    }
                },
                removedfile(file) {
                    console.log(file);
                    if (file["upload"] === undefined) {
                        delete this.options.myFiles[file.name];
                    } else {
                        delete this.options.myFiles[file.upload.filename];
                    }
                    
                    console.log("removed ");
                    console.log(file);
                    console.log(this.options.myFiles);

                    this.options.maxFiles = ' . $maxFiles . ' - (Object.keys(this.options.myFiles).length - this.files.length) ;
                    
                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                      file.previewElement.parentNode.removeChild(file.previewElement);
                    }
                    return this._updateMaxFilesReachedClass();
                },
            });
            drops.push(dropzone' . $fieldName . ');      
            </script>';
            break;
    }
    echo ($strReturn);
}
?>

<form name="formInserir" id="formInserir" action="<?= $cfg['urls']['admin'] . '/inc/db/handlers/edit.php?table=' . $arrModel['table'] ?>" method="post" enctype="multipart/form-data">
    <h5 class="form-header"><?= $arrModel['label'] ?></h5>
    <!-- <div class="form-desc">
        <?php
        //? echo $arrModel['desc'];
        ?>
    </div> -->
    <input type="hidden" name="pkey" value="<?php echo $strKey; ?>">
    <?php
    foreach ($arrModel['fields'] as $k => $v) {
        if ($v['edit']) {
            writeFieldForm($cfg, $v, $k, $res[0][$k]);
        }
    }
    ?>
    <div class="form-buttons-w">
        <button class="btn btn-primary" id="saveData" type="button">
            Submit
        </button>
    </div>
</form>
<script>
    $("#saveData").on("click", function(e) {

        $('.select2-hidden-accessible').map(function() {
            const arrategories = $(this).val();
            const strCategories = arrategories.join(',');
            $("#formInserir").append('<input type="hidden" name="' + $(this).attr('name') + '" value="' + strCategories + '">');
        });

        if ($("#formInserir")[0].checkValidity()) {
            var onError = false;
            var allQueuesComplete = true;

            var pendingProcess = false;
            if (drops.length) {

                drops.forEach(dropElement => {
                    if (dropElement.getQueuedFiles().length > 0 || dropElement.getUploadingFiles().length > 0) {
                        dropElement.processQueue();
                        pendingProcess = true;
                    }


                    if (pendingProcess) {
                        return;
                    }

                    if (dropElement.files.length > dropElement.options.maxFiles) {
                        onError = true;
                    }
                    if (Object.keys(dropElement.options.myFiles).length < dropElement.options.min) {
                        alert(`Por favor, selecione no minímo ${dropElement.options.min} ficheiro(s) para o campo ${dropElement.options.label}`);
                        onError = true;
                        toSubmit = false;
                    } else {
                        // sem ficheiros para na entrada
                        if (Object.keys(dropElement.options.myFiles).length == 0) {
                            $("#formInserir").append('<input type="hidden" name="' + dropElement.options.name + '" value="">');
                        } else {


                            if (dropElement.getQueuedFiles().length > 0 || dropElement.getUploadingFiles().length > 0) {
                                allQueuesComplete = false;
                            }

                            $("#formInserir").append('<input type="hidden" name="' + dropElement.options.name + '" value="' + Object.keys(dropElement.options.myFiles).join(',') + '">');
                            dropElement.processQueue();
                        }
                    }
                });

                if (!pendingProcess && !onError && allQueuesComplete) {
                    $("#formInserir").submit();
                }
                console.log(onError);
                console.log(allQueuesComplete);
            } else {
                if (!onError) {
                    $("#formInserir").submit();
                }
            }
        } else {
            $("#formInserir")[0].reportValidity();
        }
    });
</script>