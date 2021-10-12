<?php

$num_input = 7;
$num_output = 3;
$num_layers = 3;
$num_neurons_hidden = 200;
$desired_error = 0.00001;
$max_epochs = 200000;
$epochs_between_reports = 1000;
 
$ann = fann_create_standard($num_layers, $num_input, $num_neurons_hidden, $num_output);
 
if ($ann) {
    fann_set_activation_function_hidden($ann, FANN_SIGMOID_SYMMETRIC);
    fann_set_activation_function_output($ann, FANN_SIGMOID_SYMMETRIC);
    fann_set_training_algorithm($ann, FANN_TRAIN_QUICKPROP);
 
    $filename = ($_SERVER['DOCUMENT_ROOT'].'/uploads/powder.data');
    if (fann_train_on_file($ann, $filename, $max_epochs, $epochs_between_reports, $desired_error))
        fann_save($ann, dirname(__FILE__) . "/powder_float.net");
 
    fann_destroy($ann);
}

echo "Тренування нейронної мережі було виконано <b>успішно!</b>
<br> Результати збережено до файлу: <i>powder_float.net</i>.
<br><br> Тепер можна повернутися до попереднього вікна.";
?>
