#include <stdio.h>
#include <dirent.h>

int main()
{
    // These are data types defined in the "dirent" header
    DIR *theFolder = opendir("path/of/folder");
    struct dirent *next_file;
    char filepath[256];

    while ( (next_file = readdir(theFolder)) != NULL )
    {
        // build the path for each file in the folder
        sprintf(filepath, "%s/%s", "path/of/folder", next_file->d_name);
        remove(filepath);
    }
    closedir(theFolder);
    return 0;
}