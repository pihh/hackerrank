<?php
    /**
    |---------------------------
    | Find the running median
    | @desc: The median of a dataset of integers is the midpoint value of the dataset for which an equal number of integers are less than and greater       than the value. To find the median, you must first sort your dataset of integers in non-decreasing order, then: 
            * If your dataset contains an odd number of elements, the median is the middle element of the sorted sample. In the sorted dataset ,  is the median.
            * If your dataset contains an even number of elements, the median is the average of the two middle elements of the sorted sample. In the sorted dataset [1,2,3,4], (2+3)/4  is the median.
            
    | @want:    * Given an input stream of  integers, you must perform the following task for each  integer:
                * Add the  integer to a running list of integers.
                * Find the median of the updated list (i.e., for the first element through the  element).
                * Print the list's updated median on a new line. The printed value must be a double-precision number scaled to decimal place (i.e.,  format).    
    |---------------------------
     */


    $handle = fopen ("php://stdin","r");
    fscanf($handle,"%d",$n);

    $a_temp = stream_get_contents($handle);

    $a = explode("\n",$a_temp);

    array_walk($a,'intval');

    // One element at some point was ""
    array_walk($a,'trim');
    foreach ($a as $key=>$value){
        if (empty($value)){
             unset($a[$key]);      
        }
    }

    $min = new SplMinHeap();
    $max = new SplMaxHeap();

    //For the first two elements add smaller one to the maxHeap on the left, and bigger one to the minHeap on the right. Then process stream data one by one,

    if($a[0] > $a[1]){
        $min->insert($a[0]);
        $max->insert($a[1]);
    }else{
        $min->insert($a[1]);
        $max->insert($a[0]);
    }

    print(number_format($a[0],1,'.','')."\n");
    print(number_format(($a[0]+$a[1])/2,1,'.','')."\n");


    //Step 1: Add next item to one of the heaps
        //if next item is smaller than maxHeap root add it to maxHeap, else add it to minHeap
    for($i = 2; $i < $n ; $i++){

        $item = $a[$i];
        if($item < $max->top()){
            $max->insert($item);
        }else{
            $min->insert($item);
        }


        // Balance the heaps
        $size_min = $min->count();
        $size_max = $max->count();

        if($size_min == $size_max +2){
            //insert the greater val in max to the min and balance the size of the heaps
            $max->insert($min->top());
            $min->next();

            $left = $min->top();
            $right = $max->top();

            $print =($left + $right)/2;


        }elseif($size_max == $size_min +2){
            $min->insert($max->top());
            $max->next();

            $left = $min->top();
            $right = $max->top();

            $print =($left + $right)/2;

        }

        if($size_min == $size_max + 1){

            $print = $min->top();
        }elseif($size_max == $size_min +1){

            $print = $max->top();
        }

        if($size_min == $size_max){
            $left = $min->top();
            $right = $max->top();

            $print =($left + $right)/2;
        }

        print(number_format($print,1,'.',''))."\n";
    }

?>
