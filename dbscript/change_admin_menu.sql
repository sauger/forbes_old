delete from fb_admin_menu where id in(16,17,20,23);
update fb_admin_menu set href='/admin/list/',is_root = 0 where id=13;
