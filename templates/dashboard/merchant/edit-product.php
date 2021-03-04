        <!-- Wallet Card -->
        <div class="section pt-2">
            <div class="wallet-card">


                <div class="action-sheet-content">
                    <form action="/merchants/<?= $ProductInfo->id ?>/edititem" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <?= $Self->tokenize() ?>
                        <div class="form-group basic" id="main_category_box">
                            <div class="input-wrapper">
                                <label class="label" for="maincategoryloader">Select Category</label>
                                <select class="form-control form-control-lg custom-select" id="maincategoryloader" name="main_category" required aria-required="true">
                                    <?= $Core->LoadMainCategories($ProductInfo->maincategory) ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group basic d-none" id="sub_category_box_loader"></div>
                        <div class="form-group basic" id="sub_category_box">
                            <div class="input-wrapper">
                                <label class="label" for="subcategory_selector_input">Select Sub Category</label>
                                <select class="form-control form-control-lg custom-select" id="subcategory_selector_input" name="sub_category" required aria-required="true">
                                    <?= $Core->LoadSubCategories($ProductInfo->maincategory, $ProductInfo->subcategory) ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group basic d-none" id="rootcategory_box_loader"></div>
                        <div class="form-group basic" id="rootcategory_box">
                            <div class="input-wrapper">
                                <label class="label" for="rootcategory_selector_input">Select Category</label>
                                <select class="form-control form-control-lg custom-select" id="rootcategory_selector_input" name="root_category">
                                    <?= $Core->LoadCategories($ProductInfo->subcategory, $ProductInfo->category) ?>
                                </select>
                            </div>
                        </div>



                        <div class="form-group basic mt-3">
                            <label class="label" for="title">Product Title/Name (<span id="xProductTitle_counter" data-count="<?= product_title_count ?>"><?= product_title_count ?></span> chars)</label>
                            <div class="input-group mb-2">
                                <input class="form-control form-control-lg xProductTitle" required aria-required="true" type="text" name="title" id="title" maxlength="<?= product_title_count ?>" placeholder="Product Title/Name" value="<?= $ProductInfo->name ?>">
                            </div>
                        </div>

                        <div class="form-group basic">
                            <label class="label" for="description">Product Description(<span id="xProductDescription_counter" data-count="<?= product_description_count ?>"><?= product_description_count ?></span> chars)</label>
                            <div class="input-group mb-2">
                                <textarea class="form-control form-control-lg xProductDescription" required aria-required="true" name="description" id="description" maxlength="<?= product_description_count ?>" placeholder="Product Description"><?= $ProductInfo->description ?></textarea>
                            </div>
                        </div>


                        <div class="form-group basic">

                            <div class="row">
                                <div class="col-12 col-md-4 col-sm-12 col-xs-12 col-lg-4">
                                    <label class="label" for="bulkprice">Bulk Price</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="bulkpriceinput"><?= $LocationInfo->currency_code ?></span>
                                        </div>
                                        <input type="number" class="form-control form-control-lg" required aria-required="true" id="bulkprice" name="bulkprice" data-markup="<?= retail_markup_rate ?>" placeholder="0" value="<?= $ProductInfo->bulkprice ?>">
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-sm-12 col-xs-12 col-lg-4 py-3">
                                    <div class="item">
                                        <div class="in">
                                            <div>
                                                Charge VAT (<?= system_vat_rate ?>%)?
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="charge_vat" class="custom-control-input" value="1" id="charge_vat" <?= $ProductInfo->charge_vat?'checked':'' ?> />
                                                <label class="custom-control-label" for="charge_vat"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-sm-12 col-xs-12 col-lg-4">

                                    <label class="label" for="retailprice">Retail Price (<strong><?= retail_markup_rate ?>% Markup</strong>)</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="retailpriceinput"><?= $LocationInfo->currency_code ?></span>
                                        </div>
                                        <input type="number" class="form-control form-control-lg" required aria-required="true" id="retailprice" name="retailprice" data-markup="<?= retail_markup_rate ?>" placeholder="0" value="<?= $ProductInfo->retailprice ?>">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="form-group basic">

                            <div class="row" id="uploaded_images">

                                <?php for ($i = 0; $i < $CountPhotos; $i++) : ?>
                                    <div class="col-6 col-md-3 col-sm-6 col-xs-6 col-lg-3 my-1  alert-dismissible" role="alert" id="uploaded_images-<?= $i ?>">
                                        <a href="#" type="button" class="close text-primary RemovexProductPhotoUploaderDiv" style="z-index: 20000;" aria-label="Close">
                                            <ion-icon name="close-outline" size="large"></ion-icon>
                                        </a>
                                        <div class="custom-file-upload" id="custom-file-upload-<?= $i ?>">
                                            <input type="hidden" value="<?= $Photos[$i] ?>" name="array_of_uploaded_photos[]" id="array_of_uploaded_photos" hidden>
                                            <input type="file" name="productphotos[<?= $Photos[$i] ?>]" id="productphotos<?= $i ?>" accept=".png, .jpg, .jpeg" class="ProductPhotoUploader" tabindex="<?= $i ?>">
                                            <label for=" productphotos<?= $i ?>" style="background-image:url(<?= $Photos[$i] ?>)" class="file-uploaded"><span>Photo <?= $i ?></span></label>
                                        </div>
                                    </div>
                                <?php endfor; ?>


                                <div class="col-6 col-md-3 col-sm-6 col-xs-6 col-lg-3 my-1" id="xProductPhotoUploaderDiv">
                                    <div class="custom-file-upload" id="custom-file-upload-<?= $CountPhotos ?>">
                                        <input type="file" name="productpho" id="productphotos<?= $CountPhotos ?>" class="xProductPhotoUploader" accept=".png, .jpg, .jpeg" tabindex="<?= $CountPhotos ?>">
                                        <label for="productphotos<?= $CountPhotos ?>">
                                            <span>
                                                <strong>
                                                    <div id="MainxActivityLoader" class="xActivityLoader">
                                                        <ion-icon name="add-outline"></ion-icon>
                                                    </div>
                                                    <i>Add New Photo</i>
                                                </strong>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                            </div>

                        </div>




                        <div class="form-group basic">

                            <div class="row">
                                <div class="col-12 col-md-6 col-sm-6 col-xs-2 col-lg-6">
                                    <label class="label" for="suplier_sku">Supplier SKU#</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">SKU#</span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" required aria-required="true" id="suplier_sku" name="suplier_sku">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 col-xs-2 col-lg-6">
                                    <label class="label" for="product_type">Product Type (Physical/Digital)</label>
                                    <div class="input-group mb-2">
                                        <select class="form-control form-control-lg" required aria-required="true" name="product_type" id="product_type">
                                            <option value="">Select Type</option>
                                            <option value="physical">Physical</option>
                                            <option value="physical">Digital (Downloadable)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                                <ul class="listview image-listview text mb-2 m-0 p-0">

                                    <li>
                                        <div class="item">
                                            <div class="in">
                                                <div>
                                                    Product is Used
                                                    <div class="text-muted">
                                                        Check this for used/fairly used product
                                                    </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="is_used_product" class="custom-control-input" value="1" id="is_used_product" <?= $ProductInfo->is_used_product?'checked':'' ?> />
                                                    <label class="custom-control-label" for="is_used_product"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-sm-12">
                                <ul class="listview image-listview text mb-2 m-0">

                                    <li>
                                        <div class="item">
                                            <div class="in">
                                                <div>
                                                    Add to Point of Sale (POS).
                                                    <div class="text-muted">
                                                        Your team can sell this item locally over our POS business platform.
                                                    </div>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="enable_pos_sales" class="custom-control-input" value="1" id="enable_pos_sales" <?= $ProductInfo->enable_pos_sales?'checked':'' ?> />
                                                    <label class="custom-control-label" for="enable_pos_sales"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>



                        <div class="form-group basic">

                            <div class="row">

                                <div class="col-12 col-md-6 col-sm-6 col-xs-2 col-lg-6">
                                    <label class="label" for="product_type">Select Brand (if any)</label>
                                    <div class="input-group mb-2">
                                        <select class="form-control form-control-lg" name="product_brand" id="product_brand">
                                            <?= $Core->ListBrandsToSelect() ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-sm-6 col-xs-2 col-lg-6">
                                    <label class="label" for="product_weight">Shipping Weight (kg)</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">(kg)</span>
                                        </div>
                                        <input type="number" class="form-control form-control-lg" required aria-required="true" id="product_weight" name="product_weight" placeholder="0" step="0.1" min="0" max="1000">
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