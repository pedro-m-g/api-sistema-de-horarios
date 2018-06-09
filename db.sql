-- MySQL dump 10.16  Distrib 10.1.25-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: horarios
-- ------------------------------------------------------
-- Server version	10.1.25-MariaDB-1~xenial

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `academic_program`
--

DROP TABLE IF EXISTS `academic_program`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academic_program` (
  `academics_id` int(11) NOT NULL,
  `programs_id` int(11) NOT NULL,
  PRIMARY KEY (`academics_id`,`programs_id`),
  KEY `fk_academics_has_programs_programs1_idx` (`programs_id`),
  KEY `fk_academics_has_programs_academics1_idx` (`academics_id`),
  CONSTRAINT `fk_academics_has_programs_academics1` FOREIGN KEY (`academics_id`) REFERENCES `academics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_academics_has_programs_programs1` FOREIGN KEY (`programs_id`) REFERENCES `programs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_program`
--

LOCK TABLES `academic_program` WRITE;
/*!40000 ALTER TABLE `academic_program` DISABLE KEYS */;
/*!40000 ALTER TABLE `academic_program` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `academics`
--

DROP TABLE IF EXISTS `academics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `last_name_father` varchar(255) NOT NULL,
  `last_name_mother` varchar(255) NOT NULL,
  `employee_num` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academics`
--

LOCK TABLES `academics` WRITE;
/*!40000 ALTER TABLE `academics` DISABLE KEYS */;
/*!40000 ALTER TABLE `academics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia` varchar(255) NOT NULL,
  `hora` time NOT NULL,
  `indicator` int(11) NOT NULL DEFAULT '1',
  `subgroup_id` int(11) NOT NULL,
  `academic_id` int(11) NOT NULL,
  `spaces_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_assignments_subgroups1_idx` (`subgroup_id`),
  KEY `fk_assignments_academics1_idx` (`academic_id`),
  KEY `fk_assignments_spaces1_idx` (`spaces_id`),
  CONSTRAINT `fk_assignments_academics1` FOREIGN KEY (`academic_id`) REFERENCES `academics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_assignments_spaces1` FOREIGN KEY (`spaces_id`) REFERENCES `spaces` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_assignments_subgroups1` FOREIGN KEY (`subgroup_id`) REFERENCES `subgroups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignments`
--

LOCK TABLES `assignments` WRITE;
/*!40000 ALTER TABLE `assignments` DISABLE KEYS */;
/*!40000 ALTER TABLE `assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` mediumtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `users_id` int(11) NOT NULL,
  `topics_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_users1_idx` (`users_id`),
  KEY `fk_comments_topics1_idx` (`topics_id`),
  CONSTRAINT `fk_comments_topics1` FOREIGN KEY (`topics_id`) REFERENCES `topics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_timetable_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_courses_semester_timetable1_idx` (`semester_timetable_id`),
  KEY `fk_courses_subjects1_idx` (`subject_id`),
  CONSTRAINT `fk_courses_semester_timetable1` FOREIGN KEY (`semester_timetable_id`) REFERENCES `semester_timetables` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_courses_subjects1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_groups_courses1_idx` (`course_id`),
  CONSTRAINT `fk_groups_courses1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `text` mediumtext NOT NULL,
  `assignment_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notes_assignments1_idx` (`assignment_id`),
  CONSTRAINT `fk_notes_assignments1` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_plans_programs1_idx` (`program_id`),
  CONSTRAINT `fk_plans_programs1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plans`
--

LOCK TABLES `plans` WRITE;
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;
/*!40000 ALTER TABLE `plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `responsible_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_programs_users1_idx` (`responsible_id`),
  CONSTRAINT `fk_programs_users1` FOREIGN KEY (`responsible_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs`
--

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'responsible');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule_distributions`
--

DROP TABLE IF EXISTS `schedule_distributions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule_distributions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hours` int(11) NOT NULL,
  `subjects_id` int(11) NOT NULL,
  `subgroup_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_schedule_distributions_subjects1_idx` (`subjects_id`),
  KEY `fk_schedule_distributions_subgroup_types1_idx` (`subgroup_type_id`),
  CONSTRAINT `fk_schedule_distributions_subgroup_types1` FOREIGN KEY (`subgroup_type_id`) REFERENCES `subgroup_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_schedule_distributions_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule_distributions`
--

LOCK TABLES `schedule_distributions` WRITE;
/*!40000 ALTER TABLE `schedule_distributions` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedule_distributions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semester_subject`
--

DROP TABLE IF EXISTS `semester_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semester_subject` (
  `semester_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`semester_id`,`subject_id`),
  KEY `fk_semesters_has_subjects_subjects1_idx` (`subject_id`),
  KEY `fk_semesters_has_subjects_semesters1_idx` (`semester_id`),
  CONSTRAINT `fk_semesters_has_subjects_semesters1` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_semesters_has_subjects_subjects1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semester_subject`
--

LOCK TABLES `semester_subject` WRITE;
/*!40000 ALTER TABLE `semester_subject` DISABLE KEYS */;
/*!40000 ALTER TABLE `semester_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semester_timetables`
--

DROP TABLE IF EXISTS `semester_timetables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semester_timetables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timetable_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_timetables_has_semesters_semesters1_idx` (`semester_id`),
  KEY `fk_timetables_has_semesters_timetables1_idx` (`timetable_id`),
  CONSTRAINT `fk_timetables_has_semesters_semesters1` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_timetables_has_semesters_timetables1` FOREIGN KEY (`timetable_id`) REFERENCES `timetables` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semester_timetables`
--

LOCK TABLES `semester_timetables` WRITE;
/*!40000 ALTER TABLE `semester_timetables` DISABLE KEYS */;
/*!40000 ALTER TABLE `semester_timetables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semesters`
--

DROP TABLE IF EXISTS `semesters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semesters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_num` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_semesters_plans1_idx` (`plan_id`),
  CONSTRAINT `fk_semesters_plans1` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semesters`
--

LOCK TABLES `semesters` WRITE;
/*!40000 ALTER TABLE `semesters` DISABLE KEYS */;
/*!40000 ALTER TABLE `semesters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `space_types`
--

DROP TABLE IF EXISTS `space_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `space_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `space_types`
--

LOCK TABLES `space_types` WRITE;
/*!40000 ALTER TABLE `space_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `space_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spaces`
--

DROP TABLE IF EXISTS `spaces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spaces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `space_types_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_spaces_space_types1_idx` (`space_types_id`),
  CONSTRAINT `fk_spaces_space_types1` FOREIGN KEY (`space_types_id`) REFERENCES `space_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spaces`
--

LOCK TABLES `spaces` WRITE;
/*!40000 ALTER TABLE `spaces` DISABLE KEYS */;
/*!40000 ALTER TABLE `spaces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subgroup_types`
--

DROP TABLE IF EXISTS `subgroup_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subgroup_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subgroup_types`
--

LOCK TABLES `subgroup_types` WRITE;
/*!40000 ALTER TABLE `subgroup_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `subgroup_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subgroups`
--

DROP TABLE IF EXISTS `subgroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subgroups` (
  `id` int(11) NOT NULL,
  `key` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `subgroup_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subgroups_groups1_idx` (`group_id`),
  KEY `fk_subgroups_subgroup_types1_idx` (`subgroup_type_id`),
  CONSTRAINT `fk_subgroups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_subgroups_subgroup_types1` FOREIGN KEY (`subgroup_type_id`) REFERENCES `subgroup_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subgroups`
--

LOCK TABLES `subgroups` WRITE;
/*!40000 ALTER TABLE `subgroups` DISABLE KEYS */;
/*!40000 ALTER TABLE `subgroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `key` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timetables`
--

DROP TABLE IF EXISTS `timetables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timetables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_timetables_programs1_idx` (`program_id`),
  CONSTRAINT `fk_timetables_programs1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetables`
--

LOCK TABLES `timetables` WRITE;
/*!40000 ALTER TABLE `timetables` DISABLE KEYS */;
/*!40000 ALTER TABLE `timetables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `date_opened` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_closed` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_topics_users1_idx` (`user_id`),
  CONSTRAINT `fk_topics_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `last_name_father` varchar(255) NOT NULL,
  `last_name_mother` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_users_roles1_idx` (`role_id`),
  CONSTRAINT `fk_users_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Pedro','Martin del Campo','Gonzalez','pedro.martin@uabc.edu.mx','$2y$10$BrXeDccUxxnPTq9Gy/rhLe8br8hkBV53Jp6w1ioZh/LXlxzUYYPcW','bed669b6d00393f4db1b81b208477b937db119f245fefc7db35d0ff259e7eb094b0114d743d0bf4edef88d54adcdb75f92160fcb87e9fa602a8d6b07',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-07 19:37:55
