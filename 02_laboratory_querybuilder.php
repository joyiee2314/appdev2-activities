<?php
 # Task#1
   // 1. Retrieve all students.

# SQL Syntax
   // SELECT * FROM students;

Route::get('/task1', function(){
   $students = DB::table('students')
   ->get();
   return response()->json($students);
});


 # Task  #2
   //  2. Retrieve students in a specific grade.

# SQL Syntax
   // SELECT * FROM students WHERE grade = '10';

Route::get('/task2', function(){
   $students = DB::table('students')
   ->where('grade', '10')
   ->get();
   return response()->json($students);
});

# Task#3
   // 3. Retrieve students with a specific age range.

# SQL Syntax
      // SELECT * FROM students WHERE age BETWEEN 15 AND 18;

Route::get('/task3', function(){
   $students = DB::table('students')->whereBetween('age', [15, 18])->get();
   return response()->json($students);
});


# Task#4 
// 4. Retrieve students from a specific city.

# SQL Syntax
   // SELECT * FROM students WHERE city = 'Manila';

Route::get('/task4', function(){
   $students = DB::table('students')->where('city', 'Manila')->get();
      return response()->json($students);
});


# Task #5
   // 5. Retrieve students sorted by their age in descending order.

# SQL Syntax  
   // SELECT * FROM students ORDER BY age DESC;

Route::get('/task5', function(){
   $students = DB::table('students')
    ->orderBy('age', 'desc')->get();
   return response()->json($students);
});


# Task #6
// 6. Retrieve students with their corresponding teacher.
 # SQL Syntax
   // SELECT students.*, teachers.name AS teacher_name
   // FROM students
   // LEFT JOIN teachers ON students.teacher_id = teachers.id;

Route::get('/task6', function(){
   $students = DB::table('students')
      ->select('students.*', 'teachers.name AS teacher_name')
      ->leftJoin('teachers', 'students.teacher_id', '=', 'teachers.id') 
      ->get();
   return response()->json($students);
});


# Task #7
   // 7. Retrieve teachers along with the number of students they teach.

 # SQL Syntax
   // SELECT teachers.*, COUNT(students.id) AS student_count
   // FROM teachers
   // LEFT JOIN students ON teachers.id = students.teacher_id
   // GROUP BY teachers.id;

Route::get('/task7', function(){
   $teachers = DB::table('teachers')
     ->select('teachers.*', DB::raw('COUNT(students.id) AS student_count'))
     ->leftJoin('students', 'teachers.id', '=', 'students.teacher_id')
     ->groupBy('teachers.id')
     ->get();
   return response()->json($teachers);

});


# Task #8
   // 8. Retrieve students with their corresponding subjects.

# SQL Syntax
   // SELECT students.*, subjects.name AS subject_name
   // FROM students
   // INNER JOIN subjects ON students.subject_id = subjects.id;

Route::get('/task8', function(){
   $students = DB::table('students')
    ->select('students.*','subjects.name AS subject_name')
    ->join('subjects', 'students.subject_id', '=', 'subjects.id')
    ->get();
  return response()->json($students);
});


# Task #9
   // 9. Retrieve students along with their average scores.

# SQL Syntax
   // SELECT students.*, AVG(scores.score) AS average_score
   // FROM students
   // LEFT JOIN scores ON students.id = scores.student_id
   // GROUP BY students.id;

Route::get('/task9', function(){
   $students = DB::table('students')
       ->select('students.*', DB::raw('AVG(scores.score) AS average_score'))
       ->leftJoin('scores', 'students.id', '=', 'scores.student_id')
       ->groupBy('students.id')
       ->get();
   return response()->json($students);
});


# Task #10
   // 10. Retrieve top 5 teachers with the highest number of students.

# SQL Syntax
    //  SELECT teachers.*, COUNT(students.id) AS student_count
    //  FROM teachers
    //  LEFT JOIN students ON teachers.id = students.teacher_id
    //  GROUP BY teachers.id
    //  ORDER BY student_count DESC
    //  LIMIT 5

 Route::get('/task10', function(){
 $teachers = DB::table('teachers')
    ->select('teachers.*', DB::raw('COUNT(students.id) AS student_count'))
    ->leftjoin('students', 'teachers.id', '=', 'students.teacher_id')
    ->groupby('teachers.id')
    ->orderBy('student_count', 'desc')
    ->limit(5)
    ->get();
  return response()->json($teachers);
});

?>