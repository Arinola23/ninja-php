<!-- File system(communicating with our file system)
 PHP can communicatse with files on our or server -->

 <?php
    // $qoutes = readfile("readme.txt");
    //  echo $qoutes;
    $file = "qoutes.txt";

    // if(file_exists($file)){
    //     //if it is true we can read the file
    //  echo readfile($file) . '<br/>';

    //     //copy file
    // copy($file, 'qoutes.txt');

    //     //absolute path
    // echo realpath($file) . '<br/>';// ie echo the real path this file belongs to.

    // //file size
    // echo filesize($file) . '<br/>';

    // //rename file
    // rename($file, 'test.txt');
    // } else {
    //     echo "file does not exist";
    // }
    //  //to create folder
    // mkdir('time');

        //opening a file for reading
    $handle = fopen($file, 'r');

        //opening a file for writing
    $handle = fopen($file, 'a+');
        //link to read more about the  letters https://www.w3schools.com/php/func_filesystem_fopen.asp

        //read the file
    echo fread($handle, filesize($file));
    echo fread($handle, 112);

        //read a single line, s stands for single
    echo fgets($handle);
    echo fgets($handle); //this will return  different line

        //read a single character
    echo fgetc($handle);
    echo fgetc($handle); //this will return  different character

        //writing to a file
    fwrite($handle, '\nI love you');

    //to close the file
    fclose($handle);

    //to delete the file
    unlink($file);

 ?>