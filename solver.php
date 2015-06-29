<?php

$grid = array(array(0, 4, 0, 1, 0, 0, 0, 0, 0),
              array(0, 0, 3, 5, 0, 0, 0, 1, 9),
              array(0, 0, 0, 0, 0, 6, 0, 0, 3),
              array(0, 0, 7, 0, 0, 5, 0, 0, 8),
              array(0, 8, 1, 0, 0, 0, 9, 6 ,0),
              array(9, 0, 0, 2, 0, 0, 7, 0, 0),
              array(6, 0, 0, 9, 0, 0, 0, 0, 0),
              array(8, 1, 0, 0, 0, 2, 4, 0, 0),
              array(0, 0, 0, 0, 0, 4, 0, 9, 0));

solveSudoku($grid);

function solveSukoku(&$grid, $x = 0, $y = 0)
{
    // if number already set in the grid
    if ($grid[$x][$y] > 0)
    {
        
    }
}
