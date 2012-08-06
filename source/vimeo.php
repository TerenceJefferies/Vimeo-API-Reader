<?php

    /*
     * @name: vimeo
     * 
     * @author: Terence Jefferies
     * 
     * @date: 06/08/2012
     * 
     * @license: Attribution 3.0 Unported
     * 
     * @params:
     * - (string) user: the username of the user to retrieve data for
     * 
     */
    class vimeo{
        
        /*
         * (string) user: the username of the user to retrieve data for
         */
        private $user = null;
        
        /*
         * __construct, used to perform startup proceedures for the vimeo class
         * 
         * @params
         * - (string) users: the username of the user who's data is being 
         * retrieved
         * 
         * @returns
         * - void
         * 
         */
        public function __construct($user)
        {
            
            $this -> user = $user;
            
        }
        
        /*
         * retrieveInfo, retrieves the vimeo information for the user defined 
         * upon instansiation
         * 
         * @params
         * - void
         * 
         * @returns
         * - (array): An array containing the users data
         */
        public function retrieveInfo()
        {
            
            $data = file_get_contents('http://vimeo.com/api/v2/' . $this -> user . '/info.php');
            return unserialize($data);
            
        }
        
        /*
         * retrieveVideos, retrieves the users vides from vime, returning them
         * as a mutidimensional array
         * 
         * @params
         * - void
         * 
         * @returns
         * - (array): An array containing the suers videos
         */
        public function retrieveVideos() {
            
            $data = file_get_contents('http://vimeo.com/api/v2/' . $this -> user . '/videos.php');
            return unserialize($data);
            
        }
        
        /*
         * retrievesLikes, retrieves the users likes from vimeo
         * 
         * @params
         * - void
         * 
         * @returns
         * - (array): An array containing the videos that the user likes
         */
        public function retrieveLikes() {
            
            $data = file_get_contents('http://vimeo.com/api/v2/' . $this -> user . '/likes.php');
            return unserialize($data);
            
        }
        
        /*
         * retrieveAppearances, retrieves the users video appearances from
         * twitter
         * 
         * @params
         * - void
         * 
         * @returns
         * - (array): An array containing a list of the users appearances
         */
        public function retrieveAppearances() {
            
            $data = file_get_contents('http://vimeo.com/api/v2/' . $this -> user . '/appears_in.php');
            return unserialize($data);
            
        }
        
        /*
         * retrieveSubscriptions, retrieves the users subscriptions from viemo
         * 
         * @params
         * - void
         * 
         * @returns
         * - (array): An array containing the users subscriptions
         */
        public function retrieveSubscriptions() {
            
            $data = file_get_contents('http://vimeo.com/api/v2/' . $this -> user . '/subscriptions.php');
            return unserialize($data);
            
        }
        
        /*
         * retrieveAlbumns, retrieves the users albums from vimeo
         * 
         * @params
         * - void
         * 
         * @returns
         * - (array): An array containing the users albums
         */
        public function retreiveAlbums() {
            
            $data = file_get_contents('http://vimeo.com/api/v2/' . $this -> user . '/albums.php');
            return unserialize($data);
            
        }
        
        /*
         * retrieveChannels, retrieves the users channels from Vimeo
         * 
         * @params
         * - void
         * 
         * @returns
         * - (array): an array containing the users channels and the channels 
         * they have subscribed to
         */
        public function retrieveChannels() {
            
            $data = file_get_contents('http://vimeo.com/api/v2/' . $this -> user . '/channels.php');
            return unserialize($data);
            
        }
        
        /*
         * retrieveGroups, retrieves the groups the user has joined and created 
         * from twitter
         * 
         * @params
         * - void
         * 
         * @returns
         * - (array): An array containing the users joined and created groups
         * 
         */
        public function retrieveGroups() {
            
            $data = file_get_contents('http://vimeo.com/api/v2/' . $this -> user . '/groups.php');
            return unserialize($data);
            
        }
          
        /*
         * retrieveNumberOfVideos, retrieves the number of videos that the user
         * has uploaded
         * 
         * @params
         * - void
         * 
         * @returns
         * - (integer): The number of videos that the user has uploaded
         */
        public function retrieveNumberOfVideos()
        {
            
            return sizeof($videos = $this -> retrieveVideos());
            
        }
        
        /*
         * userLikesVideo, determines if the user submitted upon instansiation
         * likes the specified video
         * 
         * @params
         * - (integer) target: The ID of the video that we are checking
         * 
         * @returns
         * - (boolean): true if the user likes the video, false otherwise
         * 
         */
        public function userLikesVideo($target) {
            
            $returnVar = false;
            $likes = $this -> retrieveLikes();
            foreach($likes as $a)
            {
                
                if($a['id'] == $target)
                {
                    
                    $returnVar = true;
                    
                }
                
            }
            return $returnVar;
            
        }
        
    }

?>
