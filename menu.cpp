#include <iostream>
#include <cstdarg>
#include <string>
#include <fstream>
#include <memory>
#include <cstdio>

using namespace std;
std::string exec(const char* cmd) {
    std::shared_ptr<FILE> pipe(popen(cmd, "r"), pclose);
    if (!pipe) return "ERROR";
    char buffer[128];
    std::string result = "";
    while (!feof(pipe.get())) {
        if (fgets(buffer, 128, pipe.get()) != NULL)
            result += buffer;
    }
    return result;
}

int main()
{
    cout<<"eCommerce Image Tool"<<endl;
    int choice = 1;
    
    while (choice) {
        cout << "Choose image format" << endl;
        cout << "1) jpg" << endl;
        cout << "2) png" << endl;
        cout << "3) gif" << endl;        
        cout << "4) webp" << endl;
        cout << "5) avif" << endl;
        cout << "0) END" << endl;
        cin >> choice;
        cout << "Chosen format: "<< choice << endl;
        string answer = "";
        switch(choice) {
            case 1:
                answer = exec("php ./jpg.php");
                break;
            case 2:
                answer = exec("php ./png.php");
                break;
            case 3:
                answer = exec("php ./gif.php");
                break;
            case 4:
                answer = exec("php ./webp.php");
                break;
            case 5:
                answer = exec("php ./avif.php");
                break;
            case 0:
            default:
                cout << "None" << endl;
                break;
        }
        //string str = exec("pwd");
        cout << answer << endl;
        //break;
    }

    return 0;
}
