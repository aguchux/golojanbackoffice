DELIMITER $$
CREATE TRIGGER after_product_insert
AFTER INSERT
ON golojan_products FOR EACH ROW
BEGIN
 UPDATE golojan_products SET new.slug = md5(lower(new.id));
END$$
DELIMITER ;