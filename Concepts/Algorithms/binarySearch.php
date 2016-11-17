<?php
    /**
     * Compare with the midpoint -> if greater jump to the right and repeat
     *
     */

    function binarySearch($needle, array $haystack, $compare, $high, $low = 0, $containsDuplicates = false)
    {
        $key = false;
        // Whilst we have a range. If not, then that match was not found.
        while ($high >= $low) {
            // Find the middle of the range.
            $mid = (int)floor(($high + $low) / 2);
            // Compare the middle of the range with the needle. This should return <0 if it's in the first part of the range,
            // or >0 if it's in the second part of the range. It will return 0 if there is a match.
            $cmp = call_user_func($compare, $needle, $haystack[$mid]);
            // Adjust the range based on the above logic, so the next loop iteration will use the narrowed range
            if ($cmp < 0) {
                $high = $mid - 1;
            } elseif ($cmp > 0) {
                $low = $mid + 1;
            } else {
                // We've found a match
                if ($containsDuplicates) {
                    // Find the first item, if there is a possibility our data set contains duplicates by comparing the
                    // previous item with the current item ($mid).
                    while ($mid > 0 && call_user_func($compare, $haystack[($mid - 1)], $haystack[$mid]) === 0) {
                        $mid--;
                    }
                }
                $key = $mid;
                break;
            }
        }

        return $key;
    }

    /** Simple version **/
    function binarySearch($array, $searchFor) {
	$low = 0;
	$high = count($array) - 1;
	$mid = 0;

	while ($low <= $high) { // While the high pointer is greater or equal to the low pointer
		$mid = floor(($low + $high) / 2);
		$element = $array[$mid];

		if ($searchFor == $element) { // If this is the value we're searching for
			return $mid;
		} else if ($searchFor < $element) {
			$high = $mid - 1;
		} else {
			$low = $mid + 1;
		}
	}
	   return -1;
    }

?>
