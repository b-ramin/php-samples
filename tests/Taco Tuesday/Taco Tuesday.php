<?php
function lineTime(array $customers, int $registerCount, int $firstRegister = 0, int $timeToOpen = 0)
{
    if (!$registerCount) {
        throw new exception('Time to open a register!');
    }
	
    // Initialize an array of registers with default wait times
    $registers = array_fill($firstRegister, $registerCount, $timeToOpen);
    
    foreach ($customers as $customer) {
        // Find all registers with the lowest wait time
        $availableRegisters = array_keys($registers, min($registers));
        // Add the next customer wait time to the next available register
        $nextRegister = $availableRegisters[0];
        $registers[$nextRegister] += $customer;
    }

    return max($registers);
}
