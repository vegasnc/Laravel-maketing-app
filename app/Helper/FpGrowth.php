<?php

namespace App\Helper;

	class FPGrowth
	{
		public $frequentItem;
		public $minimumSupportCount;
		public $minConfidence;
		public $supportCount;
		public $orderedFrequentItem;
		public $FPTree;

		function __construct()
		{
			$this->frequentItem = array();
			$this->minimumSupportCount = 3;
			$this->minConfidence = 60 * 0.01;
			$this->supportCount 	= array();
			$this->orderedFrequentItem = array();
		}

		/*
		*input array of frequent pattern
		*/
		public function set($t)
		{
			if(is_array($t))
			{
				$this->frequentItem[] 	= $t;
			}
		}

		public function get()
		{
			echo "<pre>";
			print_r($this->frequentItem);
			echo "</pre>";
		}

		public function getFrequentItem()
		{
			echo "<pre>";
			print_r($this->frequentItem);
			echo "</pre>";
		}

		public function orderFrequentItem($frequentItem, $supportCount)
		{
			foreach ($frequentItem as $k => $v) {
				$ordered 	= array();
				foreach ($supportCount as $key => $value) {
					if(isset($v[$key]))
					{
						$ordered[$key]	= $v[$key];
					}
				}
				$this->orderedFrequentItem[$k]	= $ordered;
			}
		}

		public function getOrderedFrequentItem()
		{
			echo "<pre>";
			print_r($this->orderedFrequentItem);
			echo "</pre>";
		}

		public function countSupportCount()
		{
			if(is_array($this->frequentItem))
			{
				foreach ($this->frequentItem as $key => $value) {
					if(is_array($value))
					{
						foreach ($value as $k => $v) {
							if (empty($this->supportCount[$v])) {
								$this->supportCount[$v] = 1;
							}else{
								$this->supportCount[$v] = $this->supportCount[$v] + 1;
							}
						}
					}
				}
			}
		}

		public function getSupportCount()
		{
			echo "<pre>";
			print_r($this->supportCount);
			echo "</pre>";
		}

		public function orderBySupportCount()
		{
			ksort($this->supportCount);
			arsort($this->supportCount);
		}

		public function removeByMinimumSupport($supportCount)
		{
			if(is_array($supportCount))
			{
				$this->supportCount = array();
				foreach ($supportCount as $key => $value) {
					if ($value >= $this->minimumSupportCount)
					{
						$this->supportCount[$key] = $value;
					}
				}
			}
		}

		/* struktur array
		* item  : (I1, I2, dst)
		* count : (2, 3, 4)
		* child : (next array)
		*/
		public function buildFPTree($orderedFrequentItem)
		{
			$FPTree[] 	= array(
				'item'	=> 'null',
				'count'	=> 0,
				'child'	=> null,
			);
			$FPTree2[] 	= array();
			if(is_array($orderedFrequentItem))
			{
				$i 	= 0;
				foreach ($orderedFrequentItem as $orderedFrequentItemKey => $orderedFrequentItemValue) {
					// inisiasi ke FPTree 0 // save key FPTree sementara
					$FPTreeTemp 	= $FPTree[0];
					$FPTreeTempKey 	= array(0);

					foreach ($orderedFrequentItemValue as $itemKey => $itemValue) {
						// add key FPTree sementara
						array_push($FPTreeTempKey, $itemValue);
						
						// insert tree ke FPTree
						switch ((count($FPTreeTempKey))) {
							case 2:
								if(empty($FPTree[0]['child'][$itemValue]))
								{
									$FPTree[0]['child'][$itemValue] 	= array(
										'item'	=> $itemValue,
										'count'	=> 1,
										'child'	=> null,
									);
								}else{
									$FPTree[0]['child'][$itemValue]['count'] = $FPTree[0]['child'][$itemValue]['count'] + 1;
								}
								break;

							case 3:
								if(empty($FPTree[0]['child'][$FPTreeTempKey[1]]['child'][$itemValue]))
								{
									$FPTree[0]['child'][$FPTreeTempKey[1]]['child'][$itemValue] 	= array(
										'item'	=> $itemValue,
										'count'	=> 1,
										'child'	=> null,
									);
								}else{
									$FPTree[0]['child'][$FPTreeTempKey[1]]['child'][$itemValue]['count'] = $FPTree[0]['child'][$FPTreeTempKey[1]]['child'][$itemValue]['count'] + 1;
								}
								break;

							case 4:
								if(empty($FPTree[0]['child'][$FPTreeTempKey[1]]['child'][$FPTreeTempKey[2]]['child'][$itemValue]))
								{
									$FPTree[0]['child'][$FPTreeTempKey[1]]['child'][$FPTreeTempKey[2]]['child'][$itemValue] 	= array(
										'item'	=> $itemValue,
										'count'	=> 1,
										'child'	=> null,
									);
								}else{
									$FPTree[0]['child'][$FPTreeTempKey[1]]['child'][$FPTreeTempKey[2]]['child'][$itemValue]['count'] = $FPTree[0]['child'][$FPTreeTempKey[1]]['child'][$FPTreeTempKey[2]]['child'][$itemValue]['count'] + 1;
								}
								break;

							case 5:
								if(empty($FPTree[0]['child'][$FPTreeTempKey[1]]['child'][$FPTreeTempKey[2]]['child'][$FPTreeTempKey[3]]['child'][$itemValue]))
								{
									$FPTree[0]['child'][$FPTreeTempKey[1]]['child'][$FPTreeTempKey[2]]['child'][$FPTreeTempKey[3]]['child'][$itemValue] 	= array(
										'item'	=> $itemValue,
										'count'	=> 1,
										'child'	=> null,
									);
								}else{
									$FPTree[0]['child'][$FPTreeTempKey[1]]['child'][$FPTreeTempKey[2]]['child'][$FPTreeTempKey[3]]['child'][$itemValue]['count'] = $FPTree[0]['child'][$FPTreeTempKey[1]]['child'][$FPTreeTempKey[2]]['child'][$FPTreeTempKey[3]]['child'][$itemValue]['count'] + 1;
								}
								break;
							
							default:
								
								break;
						}
					}
				}
			}
			return $FPTree;
		}

		public function getFPTree()
		{
			echo "<pre>";
			print_r($this->FPTree);
			echo "</pre>";
		}

	}
?>