# PicoYPlacaPredictor
## About the project
"Pico y Placa predictor" is a program that returns whether or not that car can be on the road. The program is based on a a municipal ordinance of the Metropolitan District of Quito that limits the circulation of vehicles in a certain area, for a number of hours each day and according to the last digit of a plate number. It needs as inputs, a license plate number, a date and a time.
### Restriction Hours
Morning: 7:00 - 9:30\
Afternoon: 16:00 - 19:30\
Plates that finish in numbers:\
1 - 2 Monday\
3 - 4 Tuesday\
5 - 6 Wednesday\
7 - 8 Thursday\
9 - 0 Friday
### Pico Y Placa Exceptions
1. Formats in use are ABC-123 (old format) and ABC-1234 (new format). Nowadays, old format plate numbers are registered with an extra zero as the first numeric character. The program supports both formats.
2. Certain vehicles are exempt of Pico y Placa. These vehicles can be commercial (like taxis and buses), government, official use and decentralized autonomous governments vehicles. This program checks if a plate number is exempt of Pico y Placa. It uses the second character of a plate number, which represents the type of vehicle.
## Technologies
1. Programming language: PHP 8.0.6
2. Testing framework: PHPUnit
3. Source code editor: Atom v1.57.0
4. XAMPP 8.0.6
## Note
The project is currently available on https://picoyplacapredictoroscarchiriboga.000webhostapp.com/
## Credits
https://www.youtube.com/watch?v=khhz8RAoSww&list=LL&index=2&t=442s
