<?php
include("includes/db_connection.php");
include("includes/session.php");
include("includes/functions.php"); ?>
<?php
if (isset($_POST['search'])) {
    $search = trim($_POST['search']);

    $header = find_all_product_group_by_item($search);

    while ($row = sqlsrv_fetch_array($header, SQLSRV_FETCH_ASSOC)) {
        $row1 = find_product_group_by_pro_id($row["product_id"]);
        $items = find_item_by_product_group_id_search($row1["product_Id"], $search);
        if (sqlsrv_num_rows($items) > 0) {
            ?>
            <div class="single_container" style="padding-left: 1.5rem;padding-right: 1.5rem;">
                <div class="single_container_header" style="padding: 0;background: #006e35;color: white">
                    <div class="dv_header3"
                         style="padding-left: 10px;"> <?php echo find_category_by_cat_id($row1["category_id"])["title_en"] . " / " . $row1["title_en"]; ?> </div>
                </div>
                <div class="row g-3" style="margin-bottom: var(--bs-gutter-y);">
                    <?php

                    while ($row = sqlsrv_fetch_array($items, SQLSRV_FETCH_ASSOC)) {
                        if ($row["image"] != null || $row["image"] != "") {
                            $price = find_price_by_item_id($row["item_id"]);
                            $discount_per = find_discount_by_item_id($row["item_id"]);
                            ?>

                            <div class="col-12 col-md-6">
                                <div class="card weekly-product-card">
                                    <div class="card-body d-flex align-items-center" style="padding: 0.2rem">
                                        <div class="product-thumbnail-side">
                                            <a class="wishlist-btn" href="#"></a>
                                            <a class="product-thumbnail d-block"
                                               href="single-product.php?id=<?php echo $row["id"]; ?>&type=allProduct">
                                                <img style="border-radius: 0.75rem;"
                                                     src="<?php echo "admin/" . $row["image"]; ?>" alt=""></a></div>
                                        <div class="product-description">
                                            <a class="product-title d-block"
                                               href="single-product.php?id=<?php echo $row["id"]; ?>&type=allProduct">
                                                <?php echo $row["title_en"]; ?>
                                            </a>

                                            <p class="sale-price text-center" style="font-size: 12px;">
                                                <?php echo (isset($discount_per["discount_per"])) ? "ETB " . number_format($price["price"] - $price["price"] * ($discount_per["discount_per"] / 100), 2, '.', ',') : "ETB " . $price["price"]; ?>
                                                <span style="font-size: 12px;">
                                               <?php echo (isset($discount_per["discount_per"])) ? "ETB " . $price["price"] : ""; ?>
                                            </span><span
                                                    style="font-size: 9px;text-decoration: none;text-transform: lowercase;color: #000"><?php echo "(" . trim($price["uom"]) . ")"; ?></span>
                                            </p>

                                            <form class="cart-form row" action="#" method="post">
                                                <div class="row col-md-12 mb-3">

                                                    <div class="col-md-5 order-plus-minus d-flex align-items-center"
                                                         style="display:inline-flex !important;width: 70%">

                                                        <div class="quantity-button-handler">-</div>

                                                        <input class="form-control cart-quantity-input"
                                                               id="qty<?php echo $row["item_id"]; ?>" type="text"
                                                               step="1"
                                                               name="quantity" value="1">

                                                        <div class="quantity-button-handler">+</div>

                                                    </div>

                                                    <div class="col-md-6"
                                                         style="width: 30%;padding-left: 0;padding-right: 0">
                                                        <div class="col-md-10 text-center">
                                                            <input type="button" name="submit" id="submit"
                                                                   style="padding: 0.375rem 0.5rem;"
                                                                   onclick="addBtn(<?php echo $row["item_id"]; ?>)"
                                                                   class="btn btn-success" value="Add"/>

                                                        </div>
                                                    </div>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                    }?>
                </div>
            </div>

        <?php
        }
    }
}
?>
