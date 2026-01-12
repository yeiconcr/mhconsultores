-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: ingenieria_calidad
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('ingenieria-y-calidad-industrial-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3','i:2;',1768162295),('ingenieria-y-calidad-industrial-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer','i:1768162295;',1768162295);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `read_at` timestamp NULL DEFAULT NULL,
  `replied_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_messages_is_read_index` (`is_read`),
  KEY `contact_messages_created_at_index` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_messages`
--

LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
INSERT INTO `contact_messages` VALUES (1,'Carlos Rodríguez','carlos.rodriguez@empresa.com','+57 300 123 4567','Manufacturas del Norte S.A.S','Consulta sobre certificación ISO 9001','Buenos días, estamos interesados en implementar la certificación ISO 9001 en nuestra planta de manufactura. Nos gustaría conocer más sobre el proceso, duración y costos estimados. Actualmente tenemos 150 empleados y producimos componentes automotrices.',0,NULL,NULL,'192.168.1.100','2026-01-10 20:09:43','2026-01-11 20:09:43'),(2,'María Fernanda Gómez','mf.gomez@textiles.co','+57 301 987 6543','Textiles Colombianos','Capacitación en Lean Manufacturing','Hola, queremos capacitar a nuestro equipo de producción en metodologías Lean. Somos una empresa de 80 personas en el sector textil. ¿Podrían enviarnos información sobre los programas disponibles?',1,'2026-01-11 15:09:43','2026-01-11 17:09:43','192.168.1.101','2026-01-08 20:09:43','2026-01-11 20:09:43'),(3,'Andrés Felipe Torres','atorres@alimentos.com.co','+57 315 555 1234','Alimentos del Valle','Auditoría de calidad urgente','Necesitamos con urgencia una auditoría de calidad para nuestro proceso de producción de alimentos. Tenemos una inspección regulatoria próximamente y queremos asegurar el cumplimiento de todos los estándares.',1,'2026-01-09 20:09:43',NULL,'192.168.1.102','2026-01-07 20:09:43','2026-01-11 20:09:43'),(4,'Laura Martínez','laura.martinez@gmail.com',NULL,NULL,'Información sobre servicios','Buenas tardes, me gustaría recibir más información sobre los servicios que ofrecen. Trabajo en el área de calidad y estoy buscando opciones para mejorar nuestros procesos.',0,NULL,NULL,'192.168.1.103','2026-01-11 08:09:43','2026-01-11 20:09:43'),(5,'Roberto Sánchez','rsanchez@industrial.co','+57 320 444 8888','Industrias Metálicas RSC','Proyecto de mejora continua','Estamos iniciando un proyecto de mejora continua en nuestra planta y necesitamos asesoría especializada en Six Sigma. ¿Tienen disponibilidad para los próximos meses?',0,NULL,NULL,'192.168.1.104','2026-01-11 14:09:43','2026-01-11 20:09:43');
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_01_01_000001_create_service_categories_table',1),(5,'2024_01_01_000002_create_services_table',1),(6,'2024_01_01_000008_create_contact_messages_table',1),(7,'2024_01_01_000012_create_site_settings_table',1),(8,'2026_01_10_071147_create_subscribers_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_categories`
--

DROP TABLE IF EXISTS `service_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `service_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_categories`
--

LOCK TABLES `service_categories` WRITE;
/*!40000 ALTER TABLE `service_categories` DISABLE KEYS */;
INSERT INTO `service_categories` VALUES (1,'Consultoría','consultoria','Servicios de consultoría especializada',1,1,'2026-01-11 20:09:43','2026-01-11 20:09:43'),(2,'Capacitación','capacitacion','Formación y desarrollo de competencias',2,1,'2026-01-11 20:09:43','2026-01-11 20:09:43');
/*!40000 ALTER TABLE `service_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `description` longtext NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `benefits` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`benefits`)),
  `deliverables` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`deliverables`)),
  `price_from` decimal(10,2) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`),
  KEY `services_category_id_foreign` (`category_id`),
  CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `service_categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,1,'Implementación ISO 9001','implementacion-iso-9001','Implementación y certificación de sistemas de gestión de calidad según ISO 9001.','<p>Acompañamiento integral en el diseño, implementación y certificación de sistemas de gestión de calidad bajo la norma ISO 9001:2015.</p>','fas fa-clipboard-check',NULL,1,1,1,'\"[\\\"Mejora en la calidad de productos y servicios\\\",\\\"Aumento de la satisfacci\\\\u00f3n del cliente\\\",\\\"Reducci\\\\u00f3n de costos operativos\\\"]\"','\"[\\\"Manual de calidad\\\",\\\"Procedimientos documentados\\\",\\\"Formaci\\\\u00f3n del personal\\\"]\"',NULL,'3-6 meses','2026-01-11 20:09:43','2026-01-11 20:09:43'),(2,1,'Lean Manufacturing','lean-manufacturing','Optimización de procesos mediante eliminación de desperdicios y mejora continua.','<p>Implementación de metodología Lean para optimizar procesos productivos.</p>','fas fa-chart-line',NULL,1,2,1,'\"[\\\"Reducci\\\\u00f3n de tiempos de ciclo hasta 40%\\\",\\\"Disminuci\\\\u00f3n de inventarios\\\",\\\"Mejora en productividad\\\"]\"','\"[\\\"Diagn\\\\u00f3stico inicial\\\",\\\"Value Stream Mapping\\\",\\\"Plan de implementaci\\\\u00f3n\\\"]\"',NULL,'4-8 meses','2026-01-11 20:09:43','2026-01-11 20:09:43'),(3,1,'Six Sigma & DMAIC','six-sigma-dmaic','Reducción de variabilidad y defectos mediante metodología estadística.','<p>Proyectos Six Sigma enfocados en la reducción de defectos.</p>','fas fa-chart-bar',NULL,1,3,1,'\"[\\\"Reducci\\\\u00f3n de defectos hasta 99.99%\\\",\\\"Mejora en capacidad de procesos\\\",\\\"Decisiones basadas en datos\\\"]\"','\"[\\\"Charter del proyecto\\\",\\\"An\\\\u00e1lisis estad\\\\u00edstico completo\\\",\\\"Plan de mejoras\\\"]\"',NULL,'3-5 meses por proyecto','2026-01-11 20:09:43','2026-01-11 20:09:43'),(4,1,'Auditorías de Calidad','auditorias-de-calidad','Auditorías internas y evaluación de sistemas de gestión.','<p>Auditorías internas de calidad y evaluaciones de conformidad.</p>','fas fa-search',NULL,0,4,1,NULL,NULL,NULL,'1-2 semanas','2026-01-11 20:09:43','2026-01-11 20:09:43'),(5,2,'Capacitación en Herramientas de Calidad','capacitacion-herramientas-calidad','Formación en herramientas y metodologías de mejora continua.','<p>Talleres y capacitaciones en herramientas de calidad.</p>','fas fa-chalkboard-teacher',NULL,0,5,1,NULL,NULL,NULL,'8-24 horas según módulo','2026-01-11 20:09:43','2026-01-11 20:09:43'),(6,1,'Gestión de Proyectos de Mejora','gestion-proyectos-mejora','Planificación y gestión integral de proyectos de mejora continua.','<p>Gestión profesional de proyectos de mejora.</p>','fas fa-tasks',NULL,0,6,1,NULL,NULL,NULL,'Variable según proyecto','2026-01-11 20:09:43','2026-01-11 20:09:43');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('7Qrb4uVCvL2EXHALx5lqmkKprmWYDWHG245M05HD',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZTdiZFpBS3RRTEp5UjdYZEprTUZsTXdhajFQak9LOWZhZFpGRUZmWSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluL3NpdGUtc2V0dGluZ3MiO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czozMDoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL25vc290cm9zIjtzOjU6InJvdXRlIjtzOjU6ImFib3V0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1768162428);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `group` varchar(255) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES (1,'hero.title','Transformamos Procesos,','text','hero','Título Principal','Título principal en la sección hero de la página de inicio','2026-01-11 20:09:43','2026-01-11 20:09:43'),(2,'hero.subtitle','Garantizamos Calidad','text','hero','Subtítulo (Destacado)','Texto destacado en naranja debajo del título','2026-01-11 20:09:43','2026-01-11 20:09:43'),(3,'hero.description','Consultoría especializada en sistemas de gestión de calidad, mejora continua y optimización de procesos industriales en Colombia.','textarea','hero','Descripción','Texto descriptivo debajo del título','2026-01-11 20:09:43','2026-01-11 20:09:43'),(4,'hero.button_text','Agendar Consulta Gratis','text','hero','Texto del Botón','Texto del botón principal del hero','2026-01-11 20:09:43','2026-01-11 20:09:43'),(5,'stats.years','10+','text','stats','Años de Experiencia','Número de años de experiencia','2026-01-11 20:09:43','2026-01-11 20:09:43'),(6,'stats.companies','50+','text','stats','Empresas Asesoradas','Número de empresas asesoradas','2026-01-11 20:09:43','2026-01-11 20:09:43'),(7,'stats.projects','100+','text','stats','Proyectos Exitosos','Número de proyectos completados','2026-01-11 20:09:43','2026-01-11 20:09:43'),(8,'stats.satisfaction','95%','text','stats','Satisfacción','Porcentaje de satisfacción de clientes','2026-01-11 20:09:43','2026-01-11 20:09:43'),(9,'contact.whatsapp','573001234567','text','contact','Número de WhatsApp','Número de WhatsApp con código de país (sin + ni espacios)','2026-01-11 20:09:43','2026-01-11 20:09:43'),(10,'contact.phone','+57 300 123 4567','text','contact','Teléfono (Formato)','Número de teléfono formateado para mostrar','2026-01-11 20:09:43','2026-01-11 20:09:43'),(11,'contact.email','contacto@mhconsultores.com','text','contact','Email de Contacto','Email principal de contacto','2026-01-11 20:09:43','2026-01-11 20:09:43'),(12,'contact.address','Palmira, Valle del Cauca, Colombia','text','contact','Dirección','Dirección física de la empresa','2026-01-11 20:09:43','2026-01-11 20:09:43'),(13,'about.title','Expertos en Calidad y Mejora Continua','text','about','Título Sección','Título de la sección \"Quiénes Somos\"','2026-01-11 20:09:43','2026-01-11 20:09:43'),(14,'about.description','Somos un equipo de consultores especializados con más de 10 años de experiencia transformando procesos industriales. Ayudamos a empresas en Colombia a alcanzar la excelencia operacional mediante la implementación de sistemas de gestión de calidad y metodologías de mejora continua.','textarea','about','Descripción','Texto descriptivo de la sección \"Quiénes Somos\"','2026-01-11 20:09:43','2026-01-11 20:09:43'),(15,'about.image','images/consulting-team.png','image','about','Imagen del Equipo','Imagen que aparece en la sección \"Quiénes Somos\"','2026-01-11 20:09:43','2026-01-11 20:09:43'),(16,'services.title','Servicios Principales','text','services','Título de Servicios','Título de la sección de servicios en homepage','2026-01-11 20:16:56','2026-01-11 20:16:56'),(17,'services.subtitle','Soluciones integrales para mejorar la calidad y eficiencia de tu empresa','textarea','services','Subtítulo de Servicios','Descripción corta debajo del título de servicios','2026-01-11 20:16:56','2026-01-11 20:16:56'),(18,'cta.title','¿Listo para Transformar tu Empresa?','text','cta','Título CTA','Título del llamado a la acción final','2026-01-11 20:16:56','2026-01-11 20:16:56'),(19,'cta.description','Contáctanos y descubre cómo podemos ayudarte a alcanzar la excelencia operacional.','textarea','cta','Descripción CTA','Descripción del llamado a la acción','2026-01-11 20:16:56','2026-01-11 20:16:56');
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscribers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscribers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribers`
--

LOCK TABLES `subscribers` WRITE;
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrador MH','admin@mhconsultores.com',NULL,'$2y$12$Io6MfvD95w7ojgKZWwqyzu.EzpbHNGRysgJ6j/Ps61qB0LZawQrAi',NULL,'2026-01-11 20:09:43','2026-01-11 20:09:43');
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

-- Dump completed on 2026-01-11 15:17:13
