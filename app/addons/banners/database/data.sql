REPLACE INTO ?:banners (banner_id, status, type, target, timestamp) VALUES(23, 'A', 'G', 'T', UNIX_TIMESTAMP(NOW()) + 3);
REPLACE INTO ?:banners (banner_id, status, type, target, timestamp) VALUES(24, 'A', 'G', 'T', UNIX_TIMESTAMP(NOW()) + 2);
REPLACE INTO ?:banners (banner_id, status, type, target, timestamp) VALUES(25, 'A', 'G', 'T', UNIX_TIMESTAMP(NOW()) + 1);

REPLACE INTO ?:images (image_id, image_path, image_x, image_y) VALUES(1500, 'banner-apparel.jpg', 2499, 1173);
REPLACE INTO ?:images (image_id, image_path, image_x, image_y) VALUES(1501, 'banner-sports-and-outdoors.jpg', 2500, 1666);
REPLACE INTO ?:images (image_id, image_path, image_x, image_y) VALUES(1502, 'banner-contact-us.jpg', 2500, 1250);

REPLACE INTO ?:images_links (object_id, object_type, image_id, detailed_id, type, position) VALUES(1500, 'promo', 1500, 0, 'M', 0);
REPLACE INTO ?:images_links (object_id, object_type, image_id, detailed_id, type, position) VALUES(1501, 'promo', 1501, 0, 'M', 0);
REPLACE INTO ?:images_links (object_id, object_type, image_id, detailed_id, type, position) VALUES(1502, 'promo', 1502, 0, 'M', 0);
