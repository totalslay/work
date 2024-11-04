<?php
class FileManager {
    private $directory;

    public function __construct($directory) {
        $this->directory = rtrim($directory, '/') . '/';
    }

    public function readFile($filename) {
        $filePath = $this->directory . $filename;
        if (file_exists($filePath)) {
            $handle = fopen($filePath, 'r'); 
            $content = fread($handle, filesize($filePath)); 
            fclose($handle); 
            return $content;
        }
        return "The file was not found.";
    }

    public function writeFile($filename, $data) {
        $filePath = $this->directory . $filename;
        $handle = fopen($filePath, 'w');
        if ($handle) {
            fwrite($handle, $data); 
            fclose($handle); 
            return "The file was successfully recorded.";
        }
        return "Could not open the file for writing.";
    }

    public function deleteFile($filename) {
        $filePath = $this->directory . $filename;
        if (file_exists($filePath)) {
            unlink($filePath); 
            return "The file was successfully deleted.";
        }
        return "The file was not found.";
    }

    public function listFiles() {
        return array_diff(scandir($this->directory), ['.', '..']);
    }
}

$directory = 'H:/'; //path to directory
$fileManager = new FileManager($directory);

while (true) {
    echo "\nSelect an option:\n";
    echo "1. Reading a file\n";
    echo "2. Record a file\n";
    echo "3. Delete a file\n";
    echo "4. List of files\n";
    echo "5. Exit\n";
    $choice = readline(); 

    switch ($choice) { 
        case '1':
            echo "Enter the name of the file to read: ";
            $filename = readline(); 
            echo $fileManager->readFile($filename);
            break;
        case '2':
            echo "Enter the name of the file to record: ";
            $filename = readline(); 
            echo "Enter the data for recording: ";
            $data = readline(); 
            echo $fileManager->writeFile($filename, $data);
            break;
        case '3':
            echo "Enter the name of the file to delete: ";
            $filename = readline(); 
            echo $fileManager->deleteFile($filename);
            break;
        case '4':
            echo "List of files:\n";
            print_r($fileManager->listFiles());
            break;
        case '5':
            echo "Exiting the program.\n";
            exit;
        default:
            echo "Wrong choice. Please try again.\n";
    }
}
