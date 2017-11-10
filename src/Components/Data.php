<?php
    /**
     * NonDB - A NoSQL Database
     * 
     * This Program licensed under MIT.
     * Use it under the Law and the License.
     * 
     * @author Tianle Xu<xtl@xtlsoft.top>
     * @package NonDB
     * @license MIT
     * @category database
     * @link https://github.com/xtlsoft/NonDB/
     * 
     */

    namespace NonDB\Components;

    trait Data {

        /**
         * Data
         * 
         * @var mixed $data
         * 
         */
        protected $data;
        protected $key;

        public function get($key) {return $this->__get($key);}
        public function set($key, $val) {return $this->__set($val);}

        /**
         * Get the data
         *
         * @param mixed $key
         * 
         * @return mixed
         * 
         */
        public function __get($key){

            if(is_array($this->data[$key])){
                return (new \NonDB\Data($this->data[$key], $key))->setParent($this);
            }else{
                return $this->data[$key];
            }

        }

        /**
         * Set the data
         *
         * @param mixed $key
         * @param mixed $val
         * 
         */
        public function __set($key, $val){
            
            if($val instanceof \NonDB\Data){
                $val = $val->getArray();
            }

            $this->data[$key] = $val;

        }

        /**
         * Get the array.
         *
         * @return array
         * 
         */
        public function getArray(){

            return $this->data;

        }

    }