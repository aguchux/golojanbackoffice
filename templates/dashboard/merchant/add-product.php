        <!-- Wallet Card -->
        <div class="section pt-2">
            <div class="wallet-card">

                <div class="modal-body">
                    <div class="action-sheet-content">
                        <form action="/merchants/sellitem" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <?= $Self->tokenize() ?>
                            <input type="hidden" name="array_of_uploaded_photos" id="array_of_uploaded_photos" value="">
                            <div class="form-group basic" id="main_category_box">
                                <div class="input-wrapper">
                                    <label class="label" for="maincategoryloader">Select Category</label>
                                    <select class="form-control custom-select" id="maincategoryloader" name="main_category" required aria-required="true">
                                        <?= $Core->LoadMainCategories() ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group basic d-none" id="sub_category_box_loader"></div>
                            <div class="form-group basic" id="sub_category_box">
                                <div class="input-wrapper">
                                    <label class="label" for="subcategory_selector_input">Select Sub Category</label>
                                    <select class="form-control custom-select" id="subcategory_selector_input" name="sub_category" required aria-required="true">
                                        <option value="">Choose Sub Category</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group basic d-none" id="rootcategory_box_loader"></div>

                            <div class="form-group basic" id="rootcategory_box">
                                <div class="input-wrapper">
                                    <label class="label" for="rootcategory_selector_input">Select Category</label>
                                    <select class="form-control custom-select" id="rootcategory_selector_input" name="root_category">
                                        <option value="">Choose Category</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group basic mt-3">
                                <label class="label" for="title">Product Title/Name (<span id="xProductTitle_counter" data-count="<?= product_title_count ?>"><?= product_title_count ?></span> chars)</label>
                                <div class="input-group mb-2">
                                    <input class="form-control xProductTitle" type="text" name="title" id="title" maxlength="<?= product_title_count ?>" placeholder="Product Title/Name" required aria-required="true">
                                </div>
                            </div>

                            <div class="form-group basic">
                                <label class="label" for="description">Product Short Description(<span id="xProductDescription_counter" data-count="<?= product_short_description_count ?>"><?= product_short_description_count ?></span> chars)</label>
                                <div class="input-group mb-2">
                                    <textarea class="form-control xProductDescription summernote" name="description" id="description" maxlength="<?= product_short_description_count ?>" placeholder="Product Description" required aria-required="true"></textarea>
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
                                            <input type="number" class="form-control form-control-lg" required aria-required="true" id="bulkprice" name="bulkprice" placeholder="0" data-markup="<?= retail_markup_rate ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-xs-2 col-lg-6">
                                        <label class="label" for="retailprice">Retail Price (<strong><?= retail_markup_rate ?>% Markup</strong>)</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="retailpriceinput"><?= $LocationInfo->currency_code ?></span>
                                            </div>
                                            <input type="number" class="form-control form-control-lg" required aria-required="true" readonly aria-readonly="true" id="retailprice" name="retailprice" placeholder="0" data-markup="<?= retail_markup_rate ?>">
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
                                                            Check this for used/fairly used product</strong>
                                                        </div>
                                                    </div>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" name="is_used_product" class="custom-control-input" value="1" id="is_used_product" />
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
                                                            Your team can sell this item locally over our POS business platform.</strong>
                                                        </div>
                                                    </div>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" name="enable_pos_sales" class="custom-control-input" value="1" id="enable_pos_sales" />
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


                            <div class="form-group basic mb-5">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">Submit Product</button>
                            </div>


                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Wallet Card -->