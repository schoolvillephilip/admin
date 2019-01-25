<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Homepage Settings</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Store Settings</a></li>
                    <li>Pages</li>
                    <li class="active">Homepage</li>
                </ol>
            </div>

            <div id="page-content">
                <?php $this->load->view('msg_view'); ?>
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Slider Settings</div>
                    </div>
                    <div class="panel-body">
                        <?= form_open_multipart('settings/process', 'class="form-horizontal"'); ?>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Where to be linked to</label>
                                <div class="col-lg-7">
                                    <input type="text" name="url" class="form-control" required placeholder="Enter the Url the slider should link to. Eg: https://www.onitshamarket.com/pages/contact/">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Slider Image</label>
                                <div class="col-lg-7">
                                    <input type="file" name="slider_image" class="" required />
                                </div>
                            </div>
                            <input type="hidden" name="process_type" value="upload_slider_image">
                            <div class="panel-footer text-center">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        <?= form_close(); ?>

                        <div class="panel-body">
                            <table id="" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Image Link</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($homepage_slider as $slider ): ?>
                                    <tr>
                                        <th><img src="<?= SLIDER_IMAGE_PATH . $slider->image; ?>" alt="No image found" /></th>
                                        <th><a class="btn-linkn" href="<?= $slider->img_link; ?>"><?= $slider->img_link; ?></a></th>
                                        <th>
                                            <?php if( $slider->status == 'inactive' ): ?>
                                                <a class="btn btn-success" href="<?= base_url('settings/action/' . $slider->id.'/activate/homepage_slider'); ?>">Make Active</a>
                                            <?php else : ?>
                                                <a class="btn btn-danger" href="<?= base_url('settings/action/' . $slider->id.'/deactivate/homepage_slider'); ?>">Deactivate</a>
                                            <?php endif; ?>
                                        </th>
                                        <th><a class="btn btn-danger" href="<?= base_url('settings/action/' . $slider->id.'/delete/homepage_slider'); ?>">Delete</a></th>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Homepage Main Body Settings</div>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="" class="form-horizontal" id="homepage_category" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Please select category</label>
                                <div class="col-lg-7">
                                    <select class="form-control" name="category_id" required>
                                        <option value="">-- Please Select Category--</option>
                                        <?php foreach( $categories as $category ) :?>
                                            <option value="<?= $category->id?>"><?= ucwords($category->name); ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Post Position</label>
                                <div class="col-lg-7">
                                    <select class="form-control" name="position" required>
                                        <option value="">-- Select position which it should display --</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                            <p>While selecting the images, you need to add the respective link and position</p>
                            <div class="dz-max-files-reached"></div>
                            <div class="bord-top pad-ver">
                                <span class="btn btn-success fileinput-button dz-clickable">
                                        <i class="fa fa-plus"></i>
                                        <span>Add files...</span>
                                    </span>
                                <div class="btn-group pull-right">
                                    <button id="dz-remove-btn" class="btn btn-danger cancel"
                                            type="reset" disabled="">
                                        <i class="demo-psi-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="dz-previews">
                                <div id="dz-template" class="pad-top bord-top">
                                    <div class="media">
                                        <div class="media-body">
                                            <div class="media-block">
                                                <div class="media-left">
                                                    <img class="dz-img" data-dz-thumbnail>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-main text-bold mar-no text-overflow"
                                                       data-dz-name></p>
                                                    <span
                                                            class="dz-error text-danger text-sm"
                                                            data-dz-errormessage></span>
                                                    <p class="text-sm" data-dz-size></p>
                                                    <div id="dz-total-progress"
                                                         style="opacity:0">
                                                        <div
                                                                class="progress progress-xs active"
                                                                role="progressbar"
                                                                aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                aria-valuenow="0">
                                                            <div
                                                                    class="progress-bar progress-bar-success"
                                                                    style="width:0%;"
                                                                    data-dz-uploadprogress></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media-right">
                                            <button data-dz-remove
                                                    class="btn btn-xs btn-danger dz-cancel">
                                                <i class="demo-psi-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="process_type" value="main_category">
                            <div class="panel-footer text-center">
                                <button class="btn btn-primary category_save" type="submit">Save</button>
                            </div>
                        </form>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped table-bordered" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Position</th>
                                <th>Image / Link</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($homepage_category as $category ): ?>
                                    <tr>
                                        <th><?= $category->name; ?></th>
                                        <th><?= $category->position; ?></th>
                                        <th>
                                            <ul class="list-group-striped">
                                                <?php
                                                    $decodes = json_decode( $category->content);
                                                    foreach( $decodes as $decode ):
                                                ?>
                                                        <li>
                                                            <strong>Position :</strong> <?= $decode->position?> <br />
                                                            <strong>Image URL :</strong>
                                                                <a class="btn-link" target="_blank" href="<?= CATEGORY_HOME_IMAGE_PATH . $decode->img; ?>"><?= $decode->img; ?></a>
                                                            <br />
                                                            <strong>Image Link :</strong>
                                                                <a class="btn-link" target="_blank" href="<?= $decode->link; ?>" title="<?= $decode->link; ?>">Linked To</a><br />
                                                        </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </th>
                                        <th>
                                            <?php if( $category->status == 'inactive' ): ?>
                                                <a class="btn btn-success" href="<?= base_url('settings/action/' . $category->id.'/activate/homepage_category/'); ?>">Make Active</a>
                                            <?php else : ?>
                                                <a class="btn btn-danger" href="<?= base_url('settings/action/' . $category->id.'/deactivate/homepage_category/'); ?>">Deactivate</a>
                                            <?php endif; ?>
                                        </th>
                                        <th><a class="btn btn-danger" href="<?= base_url('settings/action/' . $category->id.'/delete/homepage_category/'); ?>">Delete</a></th>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <?php $this->load->view('templates/menu'); ?>
    </div>
    <?php $this->load->view('templates/footer'); ?>
    <button class="scroll-top btn">
        <i class="pci-chevron chevron-up"></i>
    </button>
</div>
<?php $this->load->view('templates/scripts'); ?>
<script>
    $(document).on('nifty.ready', function () {
        Dropzone.autoDiscover = false;
        let previewNode = document.querySelector("#dz-template");
        previewNode.id = "";
        let previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);
        let uplodaBtn = $('.category_save');
        let removeBtn = $('#dz-remove-btn');
        let maxImageWidth = 2000,
            maxImageHeight = 2000,
            minImageWidth = 250,
            minImageHeight = 250;
        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: base_url + "settings/process", // Set the url
            autoProcessQueue: false,
            addRemoveLinks: true,
            autoDiscover: false,
            paramName: 'image',
            thumbnailWidth: 70,
            thumbnailHeight: 70,
            maxFilesize: 20000,
            previewTemplate: previewTemplate,
            previewsContainer: "#dz-previews", // Define the container to display the previews
            clickable: ".fileinput-button", // Define the element that should be used as click trigger to select files.
            acceptedFiles: "image/*",
            uploadMultiple: true,
            parallelUploads: 100,
        });
        myDropzone.on("addedfile", function (file) {
            // Hookup the button
            uplodaBtn.prop('disabled', false);
            removeBtn.prop('disabled', false);
            file._captionBox = Dropzone.createElement( create_position_element(file.name) );
            file._captionBox2 = Dropzone.createElement( create_link_element(file.name) );
            file.previewElement.appendChild(file._captionBox);
            file.previewElement.appendChild(file._captionBox2);
        });

        myDropzone.on("sendingmultiple", function (file, xhr, formData) {
            // Show the total progress bar when upload starts
            let formDataArray = $('#homepage_category').serializeArray();
            for (let i = 0; i < formDataArray.length; i++) {
                let formDataItem = formDataArray[i];
                formData.append(formDataItem.name, formDataItem.value);
            }
        });

        uplodaBtn.on('click', function (e) {
            $('#processing').show();
            e.preventDefault();
            if (myDropzone.getQueuedFiles().length > 0) {
                myDropzone.processQueue();
            } else {
                $('#processing').hide();
                alert('Please select an image');
            }
        });

        myDropzone.on("successmultiple", function (files, response) {
            window.location.href = base_url + 'settings/home';
        });
        myDropzone.on("errormultiple", function (files, response) {
            // Gets triggered when there was an error sending the files.
            $('#processing').hide();
            alert('There was an error sending the images' + response);
        });

        myDropzone.on('thumbnail', function (file) {

        });
        removeBtn.on('click', function () {
            myDropzone.removeAllFiles(true);
            uplodaBtn.prop('disabled', true);
            removeBtn.prop('disabled', true);
        });

        function create_position_element( filename ){
            let element = `<div class="form-group"><label class="col-lg-3 control-label">Select position</label><div class="col-lg-7"><select name="${filename}_position" required class="form-control"><option value="top1">Top 1</option><option value="top">Top 2</option><option value="bottom1">Bottom 1</option><option value="bottom2">Bottom 2</option><option value="bottom3">Bottom 3</option><option value="left1">Left Slide 1</option>
        <option value="left2">Left Slide2</option><option value="left3">Left Slide 3</option><option value="left4">Left Slide 4 (Optional)</option>
        <option value="bottom_banner">Bottom Banner</option></select></div>
        </div>`;
            return element;
        }
        function create_link_element( filename){
            return `<div class="form-group"><label class="col-lg-3 control-label">Please enter the URL</label><div class="col-lg-7"><input type="text" class="form-control" required name="${filename}_url"></div></div>`;
        }

    });
</script>
<script>
    $('.table').dataTable({
        "responsive": true,
        "language": {
            "paginate": {
                "previous": '<i class="demo-psi-arrow-left"></i>',
                "next": '<i class="demo-psi-arrow-right"></i>'
            }
        }
    });
</script>
</body>
</html>
