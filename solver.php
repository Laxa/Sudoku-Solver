<?php

/* $grid is the 9x9 grid, values have to be int or result will be unexpected */
/* return false if failed to solve the grid */
function solveSudoku(&$grid, $x = 0, $y = 0)
{
    // if number already set in the grid
    if ($grid[$y][$x] > 0)
    {
        // if last number is already in the grid
        if ($x === 8 && $y === 8) return true;
        else if ($x === 8 && $y < 8) return solveSudoku($grid, 0, $y + 1);
        return solveSudoku($grid, $x + 1, $y);
    }
    // otherwise, we need to find a number that match
    else
    {
        $ret = false;
        for ($i = 1; $i < 10 && !$ret; $i++)
        {
            if (canPlaceNumber($grid, $x, $y, $i))
            {
                $grid[$y][$x] = $i;
                // stop the recursive calls when we completed the grid
                if ($x === 8 && $y === 8) return true;
                else if ($x === 8 && $y < 8) $ret = solveSudoku($grid, 0, $y + 1);
                else $ret = solveSudoku($grid, $x + 1, $y);
            }
            // this will be executed in every call when the grid is complete
            if ($ret) return true;
        }
        // we couldn't find a matching number, backtracking now
        $grid[$y][$x] = 0;
        return false;
    }
}

function canPlaceNumber($grid, $x, $y, $i)
{
    // check columns
    for ($index = 0; $index < 9; $index++)
    {
        if ($grid[$y][$index] == $i)
            return false;
    }
    // check rows
    for ($index = 0; $index < 9; $index++)
    {
        if ($grid[$index][$x] == $i)
            return false;
    }
    // check square
    $indexY = (int)($y / 3) * 3;
    $indexX = (int)($x / 3) * 3;
    $flagY = $indexY;
    $flagX = $indexX;
    for (; $indexY < $flagY + 3; $indexY++)
    {
        for ($indexX = $flagX; $indexX < $flagX + 3; $indexX++)
            if ($grid[$indexY][$indexX] == $i)
                return false;
    }
    return true;
}

function displayGrid($grid)
{
    for ($y = 0; $y < 9; $y++)
    {
        for ($x = 0; $x < 9; $x++)
            echo $grid[$y][$x];
        echo "\n";
    }
}
