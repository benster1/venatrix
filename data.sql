INSERT INTO `tcstatuss` (`id`, `tc_sts_name`, `created_at`, `updated_at`) VALUES
(1, 'User Generates', NULL, NULL),
(2, 'System Generates', NULL, NULL),
(3, 'Ready for Approval', NULL, NULL),
(4, 'Approved', NULL, NULL),
(5, 'Executed', NULL, NULL);

INSERT INTO `tcrunstatuss` (`id`, `tc_run_sts_name`, `created_at`, `updated_at`) VALUES
(1, 'No Run', NULL, NULL),
(2, 'Error', NULL, NULL),
(3, 'Failed', NULL, NULL),
(4, 'Pass', NULL, NULL);


INSERT INTO `permissions` (`id`, `permission_name`, `created_at`, `updated_at`) VALUES
(1, 'CreateUser ', NULL, NULL),
(2, 'CreateTestCase ', NULL, NULL),
(3, 'ViewTestCase ', NULL, NULL),
(4, 'EditTestCase ', NULL, NULL),
(5, 'ApproveTestCase', NULL, NULL),
(6, 'ExecuteTestCase', NULL, NULL);


INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `user_sts`, `expired_date`, `logged_in`, `last_logged_in`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'TestUser1', 'Atul', 'Kumar', 'atul.kumar@basecampcs.com', 1, NULL, 1, NULL, '$2y$10$maaIqoahEqv4uTzKQ9Pe7ONiR.74wwRH0xhUf.E9ERyabIyb/T7W.', 'pnIPDsonznUPpAGnGy7VzqFZy0bcdlCxVQTQPWLz7LuI0Gsuzvzp0iTXtTZY', '2018-01-29 22:26:48', '2018-01-29 22:26:48'),
(2, 'TestUser2', 'Gery', 'Manigbas', 'gery.manigbas@basecampcs.com', 1, NULL, 1, NULL, '$2y$10$uLRqVMyDOSy6plbhF.SZK.wT67oBEKwrWz5QPkRjSeA9MTBGhbbIC', 'wd6OaWmuXyhPqHcEOUeFLJs5YmlYEdMbADN0QkNi9Vovf1AUfSKQlMYRECq4', '2018-01-31 22:06:00', '2018-01-31 22:06:00'),
(3, 'TestUser3', 'Othmane', 'Benhammou', 'othmane.benhammou@basecampcs.com', 1, NULL, 1, NULL, '$2y$10$hGYJ1A20PmL87iTBtcFdiO3r9/6nC5/Lu1ZFEPAAMrsBDGzowCLJ6', '9Q3Lo2My63oS3slp6xrMwYFJaSdv8hAyqzIwIoo63MS6duwa0GhKm144TN4C', '2018-01-31 22:20:11', '2018-01-31 22:20:11'),
(4, 'TestUser4', 'Eric', 'Kreinar', 'eric.kreinar@basecampcs.com', 1, NULL, 1, NULL, '$2y$10$btuLEr.2miY5WUywJZub8ud6lZPOpNHenhbTjmKqwaUmh/jA0W0oa', '8t9ZhRUdz7BWlMSzWpdOnw86MFULvMupdkB7rZNRkCgWbWOCCHdOMwbp0xtb', '2018-02-01 00:18:02', '2018-02-01 00:18:02');

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', NULL, NULL),
(2, 'Manager', NULL, NULL),
(3, 'Tester', NULL, NULL),
(4, 'Reviewer', NULL, NULL);

