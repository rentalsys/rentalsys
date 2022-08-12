--
-- Database: `phpsamples`
--

--
-- Table structure for table `images_info`
--

CREATE TABLE `images_info` (
  `image_id` int(11) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `images_info`
  ADD PRIMARY KEY (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images_info`
--
ALTER TABLE `images_info`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
