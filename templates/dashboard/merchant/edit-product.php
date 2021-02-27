        <!-- Wallet Card -->
        <div class="section pt-2">
            <div class="wallet-card">


                <div class="action-sheet-content">
                    <form action="/merchants/<?= $ProductInfo->id ?>/edititem" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <?= $Self->tokenize() ?>
                        <input type="hidden" name="array_of_uploaded_photos" id="array_of_uploaded_photos" value="">

                        <div class="form-group basic" id="main_category_box">
                            <div class="input-wrapper">
                                <label class="label" for="maincategoryloader">Select Category</label>
                                <select class="form-control form-control-lg custom-select text-primary" id="maincategoryloader" name="main_category">
                                    <?= $Core->LoadMainCategories($ProductInfo->maincategory) ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group basic d-none" id="sub_category_box_loader"></div>
                        <div class="form-group basic" id="sub_category_box">
                            <div class="input-wrapper">
                                <label class="label" for="subcategory_selector_input">Select Sub Category</label>
                                <select class="form-control form-control-lg custom-select text-primary" id="subcategory_selector_input" name="sub_category">
                                    <?= $Core->LoadSubCategories($ProductInfo->maincategory, $ProductInfo->subcategory) ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group basic d-none" id="rootcategory_box_loader"></div>
                        <div class="form-group basic" id="rootcategory_box">
                            <div class="input-wrapper">
                                <label class="label" for="rootcategory_selector_input">Select Category</label>
                                <select class="form-control form-control-lg custom-select text-primary" id="rootcategory_selector_input" name="root_category">
                                    <?= $Core->LoadCategories($ProductInfo->subcategory, $ProductInfo->category) ?>
                                </select>
                            </div>
                        </div>



                        <div class="form-group basic mt-3">
                            <label class="label" for="title">Product Title/Name (<span id="xProductTitle_counter" data-count="<?= product_title_count ?>"><?= product_title_count ?></span> chars)</label>
                            <div class="input-group mb-2">
                                <input class="form-control form-control-lg xProductTitle text-primary" type="text" name="title" id="title" maxlength="<?= product_title_count ?>" placeholder="Product Title/Name" value="<?= $ProductInfo->name ?>">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <label class="label" for="description">Product Description(<span id="xProductDescription_counter" data-count="<?= product_description_count ?>"><?= product_description_count ?></span> chars)</label>
                            <div class="input-group mb-2">
                                <textarea class="form-control form-control-lg xProductDescription text-primary" name="description" id="description" maxlength="<?= product_description_count ?>" placeholder="Product Description"><?= $ProductInfo->description ?></textarea>
                            </div>
                        </div>


                        <div class="form-group basic row">

                            <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                                <div class="item">
                                    <div class="in">
                                        <div>
                                            Product is Used
                                            <div class="text-muted">
                                                Check this for used/fairly used product</strong>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="is_used_product" class="custom-control-input" value="1" id="is_used_product" <?= $ProductInfo->is_used_product ? 'checked' : ''  ?> />
                                            <label class="custom-control-label" for="is_used_product"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                                <div class="item">
                                    <div class="in">
                                        <div>
                                            Add to Point of Sale (POS).
                                            <div class="text-muted">
                                                Your team can sell this item locally over our POS business platform.</strong>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="enable_pos_sales" class="custom-control-input" value="1" id="enable_pos_sales" <?= $ProductInfo->enable_pos_sales ? 'checked' : ''  ?> />
                                            <label class="custom-control-label" for="enable_pos_sales"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>



                        <div class="form-group basic">

                            <div class="row">
                                <div class="col-12 col-md-6 col-sm-6 col-xs-2 col-lg-6">
                                    <label class="label" for="bulkprice">Bulk Price</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="bulkpriceinput"><?= $LocationInfo->currency_code ?></span>
                                        </div>
                                        <input type="number" class="form-control form-control-lg text-primary" name="bulkprice" placeholder="0" value="<?= $ProductInfo->bulkprice ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 col-xs-2 col-lg-6">
                                    <label class="label" for="retailprice">Retail Price</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="retailpriceinput"><?= $LocationInfo->currency_code ?></span>
                                        </div>
                                        <input type="number" class="form-control form-control-lg text-primary" name="retailprice" placeholder="0" value="<?= $ProductInfo->retailprice ?>">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="form-group basic">

                            <div class="row">

                                <div class="col-6 col-md-3 col-sm-6 col-xs-6 col-lg-3 mb-2">
                                    <div class="custom-file-upload" id="custom-file-upload-1">
                                        <input type="file" name="productphotos[0]" id="productphotos1" accept=".png, .jpg, .jpeg" class="xProductPhotoUploader" tabindex="1">
                                        <label for="productphotos1" style="background-image: url(<?= $ProductInfo->photo_0  ?>);no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
                                            <span>
                                                <strong>
                                                    <div id="xActivityLoader-1" class="text-primary">
                                                        <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                                    </div>
                                                    <i>Upload a Picture</i>
                                                </strong>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-6 col-md-3 col-sm-6 col-xs-6 col-lg-3 mb-2">
                                    <div class="custom-file-upload" id="custom-file-upload-2">
                                        <input type="file" name="productphotos[1]" id="productphotos2" accept=".png, .jpg, .jpeg" class="xProductPhotoUploader" tabindex="2">
                                        <label for="productphotos2" style="background-image: url(<?= $ProductInfo->photo_1  ?>);no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
                                            <span>
                                                <strong>
                                                    <div id="xActivityLoader-2">
                                                        <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                                    </div>
                                                    <i>Upload a Picture</i>
                                                </strong>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-6 col-md-3 col-sm-6 col-xs-6 col-lg-3">
                                    <div class="custom-file-upload" id="custom-file-upload-3">
                                        <input type="file" name="productphotos[2]" id="productphotos3" accept=".png, .jpg, .jpeg" class="xProductPhotoUploader" tabindex="3">
                                        <label for="productphotos3" style="background-image: url(<?= $ProductInfo->photo_2  ?>);no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
                                            <span>
                                                <strong>
                                                    <div id="xActivityLoader-3">
                                                        <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                                    </div>
                                                    <i>Upload a Picture</i>
                                                </strong>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-6 col-md-3 col-sm-6 col-xs-6 col-lg-3">
                                    <div class="custom-file-upload" id="custom-file-upload-4">
                                        <input type="file" name="productphotos[3]" id="productphotos4" accept=".png, .jpg, .jpeg" class="xProductPhotoUploader" tabindex="4">
                                        <label for="productphotos4" style="background-image: url(<?= $ProductInfo->photo_3  ?>);no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
                                            <span>
                                                <strong>
                                                    <div id="xActivityLoader-4">
                                                        <ion-icon name="arrow-up-circle-outline"></ion-icon>
                                                    </div>
                                                    <i>Upload a Picture</i>
                                                </strong>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="form-group basic">
                            <hr class="my-2 p-0" />
                            <div class="section-title">Use Features to add properties, configuration and other information such as <strong>Color</strong>,<strong>Size</strong>,<strong>Weight</strong>, etc to define your product.</div>
                            <div class="row">
                                <div class="col-12 my-3 border border-primary bg-light">
                                    <div class="input-group mb-3 p-2 border-primary row">
                                        <input type="text" class="form-control col-12" placeholder="Feature Title (e.g: Color)" id="text_feature_key">
                                        <input type="text" class="form-control col-12" placeholder="Feature Value (e.g: Blue)" id="text_feature_value">
                                        <button type="button" class="stoper btn btn-primary btn-circle btn-md px-2 xFeatureListingsBtn" id="xFeatureListingsBtn" data-productid="<?= $ProductInfo->id ?>" disabled>
                                            <ion-icon name="add-outline"></ion-icon>
                                        </button>
                                    </div>
                                    <div id="xFeatureListings" class="w-100 my-2">
                                        <?php while ($feature = mysqli_fetch_object($ProductFeatures)) : ?>
                                            <div class="alert alert-outline-success mary alert-dismissible fade show my-1 row" id="feature_<?= $feature->id ?>" role="alert">
                                                <div class="right col-6 bg-light"><?= $feature->feature_key ?></div>
                                                <div class="left col-6 bg-primary"><?= $feature->feature_value ?></div>
                                                <button type="button" class="close xDeleteFeature" id="<?= $feature->id ?>">
                                                    <ion-icon name="close-outline"></ion-icon>
                                                </button>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group basic mb-5">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Submit Product</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
        <!-- Wallet Card -->