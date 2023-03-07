<script id="postTemplate" type="text/x-jsrender">

<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 my-2 custom-card-layout" id="image-{{:imageId}}">
    <input type="radio" class="btn-check" name="preview_img" value="{{:imgUrl}}" id="img{{:imgName}}" data-id="{{:imageId}}">
    <label class="btn btn-outline btn-outline-dashed btn-outline-default align-items-center h-100 custom-card-width Add-post-modal" for="img{{:imgName}}">
        <img src="{{:imgUrl}}" class="Add-post-modal-img h-100px">
        <p class="mt-2 mb-0 custom-break">{{:imgName}}</p>
    </label>
<!--    <button type="button" class="btn btn-danger btn-sm mt-3 image-delete-btn" data-id="{{:imageId}}">Delete</button>-->
</div>


</script>

<?php
$inStyle = 'style';
$style = 'cursor: default !important;';
?>
<script id="galleryItemTemplate" type="text/x-jsrender">
  <div class="accordion mt-5" id="kt_accordion_{{:i}}">
        <div class="accordion-item">
            <h2 class="accordion-header d-flex align-items-center border-bottom-0" id="kt_accordion_{{:i}}_header_{{:i}}">
                <button class="accordion-button fs-4 fw-bold accordion-button-{{:i}}" type="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_accordion_{{:i}}_body_{{:i}}" aria-expanded="true"
                        aria-controls="kt_accordion_{{:i}}_body_{{:i}}" <?php echo $inStyle ?>="<?php echo $style ?>" id="accordion_button_{{:i}}">
<!--                    {{:i}}-->
                </button>
                <a href="javascript:void(0)"  title="{{ __('messages.delete') }}"
           class="btn px-2 text-danger fs-2 delete-gallery-item">
            <i class="fa-solid fa-trash"></i>
        </a>
            </h2>
            <div id="kt_accordion_{{:i}}_body_{{:i}}" class="accordion-collapse collapse show"
                 aria-labelledby="kt_accordion_{{:i}}_header_{{:i}}" data-bs-parent="#kt_accordion_2">
                <div class="accordion-body border-top">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mr-3"><?php echo __('messages.common.title') ?></label>
                            <input type="text" class="form-control form-control-solid gallery-list-title-{{:i}} gallery-list-title-text" id="postGalleryTitle"
                            placeholder="<?php echo __('messages.common.title') ?>" name="gallery_title[]" data-id="{{:i}}">
                        </div>
                        <div class="col-md-3 mt-5">
                        
                        <div class="mb-3" io-image-input="true">
            <label for="exampleInputImage" class="form-label"><?php echo __('messages.post.image') ?></label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage w-125px h-125px" id="exampleInputImage"  <?php echo $inStyle ?>
    ="background-image:url(<?php echo asset('front_web/images/default.jpg') ?>)">
                    </div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top" data-bs-original-title="<?php echo __('messages.common.change_image') ?>">
                        <label> 
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i> 
                            <input type="file" name="gallery_images[]" class="image-upload d-none append-image" accept="image/*" /> 
                        </label> 
                    </span>
                </div>
            </div>
        </div>  
<!--                                    <div class="justify-content-center">-->
<!--                                <label class="form-label fs-6 fw-bolder text-gray-700 mr-3">--><?php //echo __('messages.post.image')?><!--</label>-->
<!--                            </div>-->
<!--                            <div class="image-input image-input-outline" data-kt-image-input="true">-->
<!--                                <div class="image previewImage" id="exampleInputImage" --><?php //echo $inStyle?>
<!--    ="background-image:url(--><?php //echo asset('images/avatar.png')?><!--)">-->
<!--                    </div>-->
<!--                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"-->
<!--                                       data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""-->
<!--                                       data-bs-original-title="--><?php //echo __('messages.common.change_image')?><!--">-->
<!--                                    <i class="bi bi-pencil-fill fs-7">-->
<!--                                        <input type="file" name="gallery_images[]" class="append-image">-->
<!--                                    </i>-->
<!--                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg">-->
<!--                                        <input type="hidden" name="gallery_image_remove[]">-->
<!--                                </label>-->
<!--                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"-->
<!--                                      data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""-->
<!--                                      data-bs-original-title="--><?php //echo __('messages.common.cancel_image')?><!--">-->
<!--                                        <i class="bi bi-x fs-2"></i>-->
<!--                                 </span>-->
<!--                            </div>-->
                            <div class="form-group mt-3">
                                <input type="text" class="form-control form-control-solid" name="image_description[]" placeholder="<?php echo __('messages.post.image_description') ?>" maxlength="300">
                            </div>

                        </div>
                        <div class="col-md-9 add-post-text-editor mt-md-0 mt-4">
                            <button type="button" class=" btn btn-primary mb-2 btn-add-image">
                              <?php echo __('messages.post.add_image') ?>
                            </button>
                            <textarea id="" name="gallery_content[]" class="tox-target text-gallery-description" height="200px">

                     </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</script>
<script id="sortListItemTemplate" type="text/x-jsrender">
      <div class="accordion mt-5" id="kt_accordion_{{:i}}">
        <div class="accordion-item">
            <h2 class="accordion-header d-flex align-items-center border-bottom-0" id="kt_accordion_{{:i}}_header_{{:i}}">
                <button class="accordion-button accordion-button-{{:i}} fs-4 fw-bold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_accordion_{{:i}}_body_{{:i}}" aria-expanded="true"
                        aria-controls="kt_accordion_{{:i}}_body_{{:i}}" <?php echo $inStyle ?>="<?php echo $style ?>">
<!--                    {{:i}}-->
                </button>
                
                        <a href="javascript:void(0)" data-id="{{$row['id']}}" title="{{ __('messages.delete') }}"
           class="btn px-2 text-danger fs-2 delete-sort_list-item">
            <i class="fa-solid fa-trash"></i>
        </a>
            </h2>
            <div id="kt_accordion_{{:i}}_body_{{:i}}" class="accordion-collapse collapse show"
                 aria-labelledby="kt_accordion_{{:i}}_header_{{:i}}" data-bs-parent="#kt_accordion_2">
                <div class="accordion-body border-top">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <label class="form-label fs-6 fw-bolder text-gray-700 mr-3"><?php echo __('messages.common.title') ?></label>
                            <input type="text" class="form-control form-control-solid sort-list-title-{{:i}} sort-list-title-text" 
                            placeholder="<?php echo __('messages.common.title') ?>" name="sort_list_title[]" id="sortListTitle" data-id="{{:i}}">
                        </div>
                        <div class="col-md-3 mt-5">
                        
                           
                        <div class="mb-3" io-image-input="true">
            <label for="exampleInputImage" class="form-label"><?php echo __('messages.post.image') ?></label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage w-125px h-125px" id="exampleInputImage"  <?php echo $inStyle ?>
    ="background-image:url(<?php echo asset('front_web/images/default.jpg') ?>)">
                    </div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top" data-bs-original-title="<?php echo __('messages.common.change_image') ?>">
                        <label> 
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i> 
                            <input type="file" name="sort_list_images[]" class="image-upload d-none " accept="image/*" /> 
                            <input type="hidden" name="gallery_image_remove[]">
                        </label> 
                    </span>
                </div>
            </div>
        </div> 
                            <div class="form-group mt-3">
                                <input type="text" class="form-control form-control-solid" name="image_description[]" placeholder="<?php echo __('messages.post.image_description') ?>" maxlength="300">
                            </div>
                        </div>
                        <div class="col-md-9 add-post-text-editor mt-md-0 mt-4">
                            <button type="button" class=" btn btn-primary mb-2 btn-add-image">
                                <?php echo __('messages.post.add_image') ?>
                            </button>
                            <textarea id="" name="sort_list_content[]" class="tox-target text-sort_list-description" height="200px">

                     </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</script>

