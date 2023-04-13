<?php ?>

<!-- Sidebar user panel -->
<div class="user-panel">
    <a class="logo" href="/yadmin/dashboard">
        <div class="pull-left ">
            <img alt="User Image" class="img-circle image" src="/user.jpg" >
        </div>
    </a>
</div>
<hr>

<?php if (Yii::$app->user->identity->flags == 1): ?>
    <?php
// prepare menu items, get all modules
    $menuItems = [];

    $favouriteMenuItems[] = [''];

    $menuItems[] = [
        'url' => ['/yadmin/process/dashboard'],
        'icon' => 'dashboard',
        'label' => 'Dashboard',
    ];

    $menuItems[] = [
        'url' => ['/yadmin/process/school'],
        'icon' => 'building',
        'label' => 'School Information',
    ];

    $menuItems[] = [
        'url' => ['/yadmin/process/academicyear'],
        'icon' => 'calendar-o',
        'label' => 'Academic Year Config.',
    ];

// Student Information Start

    $siMenuItems = [];
    $siMenuItems[] = [
        'url' => ['/yadmin/process/student'],
        'icon' => 'circle-o text-black',
        'label' => 'Student Details',
    ];
    $siMenuItems[] = [
        'url' => ['/yadmin/process/student/schoolinghistory'],
        'icon' => 'circle-o text-black',
        'label' => 'Schooling History',
    ];
    $siMenuItems[] = [
        'url' => ['/yadmin/process/studentperformance'],
        'icon' => 'circle-o text-black',
        'label' => 'Student Performance',
    ];
    if (Yii::$app->user->can('/yadmin/process/student/marks')):
        $siMenuItems[] = [
            'url' => ['/yadmin/process/student/marks'],
            'icon' => 'circle-o text-black',
            'label' => 'Student Marks',
        ];
    endif;
    if (Yii::$app->user->can('/yadmin/process/studentmarks/index')):
        $siMenuItems[] = [
            'url' => ['/yadmin/process/studentmarks/index'],
            'icon' => 'circle-o text-black',
            'label' => 'Student Marks',
        ];
    endif;

    $siMenuItems[] = [
        'url' => ['/yadmin/process/studentcourseenrolled'],
        'icon' => 'circle-o text-black',
        'label' => 'Course/Training Enrolled',
    ];
    $siMenuItems[] = [
        'url' => ['/yadmin/process/labusage'],
        'icon' => 'circle-o text-black',
        'label' => 'Lab Attendance',
    ];
    $siMenuItems[] = [
        'url' => ['/yadmin/process/studenthealth'],
        'icon' => 'circle-o text-black',
        'label' => 'Student Health',
    ];

    $siMenuItems[] = [
        'url' => ['/yadmin/process/studentattendance'],
        'icon' => 'circle-o text-black',
        'label' => 'Student Attendance',
    ];
    $siMenuItems[] = [
        'url' => ['/yadmin/process/studentbirthday'],
        'icon' => 'circle-o text-black',
        'label' => 'Student Birthday',
    ];


    $menuItems[] = [
        'icon' => 'id-card-o',
        'label' => 'Student Information',
        'items' => $siMenuItems,
    ];

// Student Information Close
// Staff Information Start

    $TFLMenuItems = [];
    $TFLMenuItems[] = [
        'url' => ['/yadmin/process/empdetail'],
        'icon' => 'circle-o text-black',
        'label' => 'Staff Details',
    ];
    $TFLMenuItems[] = [
        'url' => ['/yadmin/process/teachertraining'],
        'icon' => 'circle-o text-black',
        'label' => 'Staff Training Details',
    ];
    $TFLMenuItems[] = [
        'url' => ['/yadmin/process/teacherlecturedelivered'],
        'icon' => 'circle-o text-black',
        'label' => 'Lectures Delivered',
    ];
    $TFLMenuItems[] = [
        'url' => ['/yadmin/process/teacherattendance'],
        'icon' => 'circle-o text-black',
        'label' => 'Staff Attendance',
    ];
    $TFLMenuItems[] = [
        'url' => ['/yadmin/process/teacherleaverecord'],
        'icon' => 'circle-o text-black',
        'label' => 'Staff Leave Records',
    ];
    $menuItems[] = [
        'icon' => 'users',
        'label' => 'Staff Information',
        'items' => $TFLMenuItems,
    ];

// Staff Information Close
// Staff Information Start

    $TMFLMenuItems = [];
    $TMFLMenuItems[] = [
        'url' => ['/yadmin/process/teachertraining/list'],
        'icon' => 'circle-o text-black',
        'label' => 'Staff Training Details',
    ];
    $TMFLMenuItems[] = [
        'url' => ['/yadmin/process/teacherfeedback'],
        'icon' => 'circle-o text-black',
        'label' => 'Teachers Feedback',
    ];

    $TMFLMenuItems[] = [
        'url' => ['/yadmin/process/studentcourseenrolled/list'],
        'icon' => 'circle-o text-black',
        'label' => 'Student Training Enrolled',
    ];

    $TMFLMenuItems[] = [
        'url' => ['/yadmin/process/studentfeedback'],
        'icon' => 'circle-o text-black',
        'label' => 'Students Feedback',
    ];

    $menuItems[] = [
        'icon' => 'list',
        'label' => 'Training Module Feedback',
        'items' => $TMFLMenuItems,
    ];

// Staff Information Close

    $menuItems[] = [
        'url' => ['/yadmin/process/sportsactivity'],
        'icon' => 'life-buoy',
        'label' => 'Sports Activity',
    ];

// Staff Information Start

    $LIFLMenuItems = [];
    $LIFLMenuItems[] = [
        'url' => ['/yadmin/process/schoolcomputerlab'],
        'icon' => 'circle-o text-black',
        'label' => 'Computer Lab',
    ];

    $LIFLMenuItems[] = [
        'url' => ['/yadmin/process/schoolstemlab'],
        'icon' => 'circle-o text-black',
        'label' => 'STEM Lab',
    ];

    $LIFLMenuItems[] = [
        'url' => ['/yadmin/process/updowntime'],
        'icon' => 'circle-o text-black',
        'label' => 'Uptime and Downtime ',
    ];

    $LIFLMenuItems[] = [
        'url' => ['/yadmin/process/acceptancetest'],
        'icon' => 'circle-o text-black',
        'label' => 'Acceptance Test',
    ];

    $LIFLMenuItems[] = [
        'url' => ['/yadmin/process/asset/index'],
        'icon' => 'circle-o text-black',
        'label' => 'Asset Details',
    ];

//if (Yii::$app->user->can('/yadmin/process/asset/upload')):
//    $labAsssetMenuItems[] = [
//        'url' => ['/yadmin/process/asset/upload'],
//        'icon' => 'circle-o text-purple',
//        'label' => 'Asset Bulk Upload',
//    ];
//endif;
    $menuItems[] = [
        'icon' => 'flask',
        'label' => 'Lab Infrastructure',
        'items' => $LIFLMenuItems,
    ];

// Staff Information Close
//  Call Log Start
    $calllogMenuItems = [];
    if (Yii::$app->user->can('/yadmin/process/assetticket/create')):
        $calllogMenuItems[] = [
            'url' => ['/yadmin/process/assetticket/create'],
            'icon' => 'circle-o text-black',
            'label' => 'Fault Logging',
        ];
    endif;
    $calllogMenuItems[] = [
        'url' => ['/yadmin/process/assetticket/index'],
        'icon' => 'circle-o text-black',
        'label' => 'Redressal Details',
    ];
    $calllogMenuItems[] = [
        'url' => ['/yadmin/process/faq/index'],
        'icon' => 'circle-o text-black',
        'label' => 'FAQ',
    ];
    $menuItems[] = [
        'icon' => 'phone',
        'label' => 'Help Desk & Fault Logging',
        'items' => $calllogMenuItems,
    ];
//  Call Log Close
// Records Start

    $reportMenuItems = [];
    $reportMenuItems[] = [
        'url' => ['/yadmin/process/report/classwise'],
        'icon' => 'file',
        'label' => 'Student Report',
        'items' => [
            [
                'url' => ['/yadmin/process/report/classwise'],
                'icon' => 'circle-o text-black',
                'label' => 'Class Wise',
            ],
            [
                'url' => ['/yadmin/process/report/religionwise'],
                'icon' => 'circle-o text-black',
                'label' => 'Religion Wise',
            ],
            [
                'url' => ['/yadmin/process/report/boygirlsratio'],
                'icon' => 'circle-o text-black',
                'label' => 'Boys/Girls Ratio',
            ],
            [
                'url' => ['/yadmin/process/report/rte'],
                'icon' => 'circle-o text-black',
                'label' => 'RTE Reporting',
            ],
            [
                'url' => ['/yadmin/process/report/sectionwise'],
                'icon' => 'circle-o text-black',
                'label' => 'Section Wise',
            ],
//        [
//            'url' => ['/yadmin/process/report/gradewise'],
//            'icon' => 'circle-o text-green',
//            'label' => 'Grade Wise',
//        ],
        ]
    ];

    $reportMenuItems[] = [
        'url' => ['/yadmin/process/report/subjectwise'],
        'icon' => 'file',
        'label' => 'Teacher Report',
        'items' => [
            [
                'url' => ['/yadmin/process/report/qualificationwise'],
                'icon' => 'circle-o text-black',
                'label' => 'Qualification Wise',
            ],
            [
                'url' => ['/yadmin/process/report/subjectwise'],
                'icon' => 'circle-o text-black',
                'label' => 'Subject Wise',
            ],
            [
                'url' => ['/yadmin/process/report/departmentwise'],
                'icon' => 'circle-o text-black',
                'label' => 'Department Wise',
            ],
            [
                'url' => ['/yadmin/process/report/salarywise'],
                'icon' => 'circle-o text-black',
                'label' => 'Salary Group Wise',
            ],
        ]
    ];

    $reportMenuItems[] = [
        'url' => ['/yadmin/process/report/studentattendance'],
        'icon' => 'file',
        'label' => 'Attendance Report',
        'items' => [
            [
                'url' => ['/yadmin/process/report/studentattendance'],
                'icon' => 'circle-o text-black',
                'label' => 'Student Attendance',
            ],
            [
                'url' => ['/yadmin/process/report/tattendance'],
                'icon' => 'circle-o text-black',
                'label' => 'Teacher Attendance',
            ],
            [
                'url' => ['/yadmin/process/report/insattendance'],
                'icon' => 'circle-o text-black',
                'label' => 'Instructor Attendance',
            ],
            [
                'url' => ['/yadmin/process/report/visittendance'],
                'icon' => 'circle-o text-black',
                'label' => 'Visiting Faculty',
            ],
        ]
    ];

    $reportMenuItems[] = [
        'url' => ['/yadmin/process/report/classwise'],
        'icon' => 'file',
        'label' => 'Student Exam Report',
        'items' => [
            [
                'url' => ['/yadmin/process/classwisereport/index'],
                'icon' => 'circle-o text-black',
                'label' => 'Class Wise',
            ],
//        [
//            'url' => ['/yadmin/process/report/gradewisereport'],
//            'icon' => 'circle-o text-green',
//            'label' => 'Grade Wise',
//        ],
            [
                'url' => ['/yadmin/process/classwisereport/boysvsgirls'],
                'icon' => 'circle-o text-black',
                'label' => 'Boys/Girls Ratio',
            ],
            [
                'url' => ['/yadmin/process/report/subjectwisereport'],
                'icon' => 'circle-o text-black',
                'label' => 'Subject Wise',
            ],
            [
                'url' => ['/yadmin/process/report/onlinemarksgenerate'],
                'icon' => 'circle-o text-black',
                'label' => 'Generate Marksheet',
            ]
        ]
    ];
    $reportMenuItems[] = [
        'url' => ['/yadmin/process/report/labreport'],
        'icon' => 'file',
        'label' => 'Lab Assets Report',
        'items' => [
            [
                'url' => ['/yadmin/process/report/labreport'],
                'icon' => 'circle-o text-black',
                'label' => 'Lab Details',
            ],
            [
                'url' => ['/yadmin/process/report/slareport'],
                'icon' => 'circle-o text-black',
                'label' => 'SLA Adherence',
            ],
            [
                'url' => ['/yadmin/process/report/udtime'],
                'icon' => 'circle-o text-black',
                'label' => 'UP / Down Time',
            ],
            [
                'url' => ['/yadmin/process/report/itemtracking'],
                'icon' => 'circle-o text-black',
                'label' => 'Item Tracking',
            ],
            [
                'url' => ['/yadmin/process/report/internetspeed'],
                'icon' => 'circle-o text-black',
                'label' => 'Internet Speed',
            ]
        ]
    ];

    $reportMenuItems[] = [
        'url' => ['/yadmin/process/report/openticket'],
        'icon' => 'file',
        'label' => 'Help Desk',
        'items' => [
            [
                'url' => ['/yadmin/process/report/openticket'],
                'icon' => 'circle-o text-black',
                'label' => 'Open Tickets',
            ],
            [
                'url' => ['/yadmin/process/report/closeticket'],
                'icon' => 'circle-o text-black',
                'label' => 'Closed Tickets',
            ],
            [
                'url' => ['/yadmin/process/report/inprocessticket'],
                'icon' => 'circle-o text-black',
                'label' => 'Escalated Tickets',
            ],
            [
                'url' => ['/yadmin/process/report/catwiseticket'],
                'icon' => 'circle-o text-black',
                'label' => 'Category wise Tickets',
            ]
        ]
    ];
    $menuItems[] = [
        'icon' => 'file',
        'label' => 'Reports',
        'items' => $reportMenuItems,
    ];
// Report Close
//User menu start.
    $UsermenuItems = [];
    $UsermenuItems[] = [
        'url' => ['/yadmin/process/empdetails/index'],
        'icon' => 'circle-o text-black',
        'label' => 'Profile',
    ];
    $UsermenuItems[] = [
        'url' => ['/yadmin/process/schooldcmapping'],
        'icon' => 'circle-o text-black',
        'label' => 'School Mapping',
    ];
    if (Yii::$app->user->can('/yadmin/user/admin/index')):
        $UsermenuItems[] = [
            'url' => ['/yadmin/user'],
            'icon' => 'circle-o text-black',
            'label' => 'User Management',
        ];
    endif;
    if (Yii::$app->user->can('/yadmin/process/empdetails/index')):
        $menuItems[] = [
            'icon' => 'user',
            'label' => 'User Management',
            'items' => $UsermenuItems,
        ];
    endif;

//User menu end

    $menuItems[] = [
        'url' => ['/yadmin/process/communication'],
        'icon' => 'commenting',
        'label' => 'Communication Mgmt.',
    ];

// Records Upload Start

    $uploadMenuItems = [];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/student/stuprofile'],
        'icon' => 'circle-o text-black',
        'label' => 'Student Upload',
    ];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/studentperformance/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'Performance Upload',
    ];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/studentmarks/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'Student Marks Upload',
    ];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/studenthealth/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'Student Health Upload',
    ];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/studentattendance/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'Student Attendance',
    ];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/teacherlecturedelivered/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'Teacher Lecture Delivered',
    ];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/teacherattendance/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'Staff Attendance',
    ];
    
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/labusage/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'Lab Attendance',
    ];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/teacherleaverecord/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'Teacher Leave Record',
    ];
    if (Yii::$app->user->can('/yadmin/process/student/stuprofile')):
        $menuItems[] = [
            'icon' => 'upload',
            'label' => 'Bulk Upload',
            'items' => $uploadMenuItems,
        ];
    endif;
// Report Upload Close

    $menuItems[] = [
        'url' => ['/yadmin/process/academicplanner'],
        'icon' => 'newspaper-o',
        'label' => 'Academic Planner',
    ];

    $menuItems[] = [
        'url' => ['/yadmin/process/report/aureport'],
        'icon' => 'window-restore',
        'label' => 'Activation & Usages',
    ];

// Time Table Start

    $timetableMenuItems = [];
    if (Yii::$app->user->can('/yadmin/process/timetable/calender')):
        $timetableMenuItems[] = [
            'url' => ['/yadmin/process/timetable/calender'],
            'icon' => 'circle-o text-black',
            'label' => 'View Time Table',
        ];
    endif;
    $timetableMenuItems[] = [
        'url' => ['/yadmin/process/timetable/index'],
        'icon' => 'circle-o text-black',
        'label' => 'Manage Time Table',
    ];

    if (Yii::$app->user->can('/yadmin/process/timetable/index')):
        $menuItems[] = [
            'icon' => 'calendar',
            'label' => 'Time Table & Tracking',
            'items' => $timetableMenuItems,
        ];
    endif;
// Time table Close

    $itemss[] = [
        'label' => 'Reports',
        'url' => ['/yadmin/process/report/post'],
        'icon' => 'circle-o text-black',
        'template' => '<a href="{url}" target="_blank">{label}</a>',
    ];
    $menuItems[] = [
        'icon' => 'dot-circle-o',
        'label' => 'Artificial Intelligence',
        'items' => $itemss,
    ];

    $menuItems[] = [
        'url' => ['/yadmin/process/apigis/index'],
        'icon' => 'info',
        'label' => 'MIS-GIS',
    ];

//Configuration menu start.
    $developerMenuItems = [];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/assetitemcategory'],
        'icon' => 'circle-o text-black',
        'label' => 'Asset Item Category',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/process/assetitemcategoryissue'],
        'icon' => 'circle-o text-black',
        'label' => 'Asset Item Issue',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/assetitemmake'],
        'icon' => 'circle-o text-black',
        'label' => 'Asset Item Make',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/assetserviceprovider'],
        'icon' => 'circle-o text-black',
        'label' => 'Asset Service Provider',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/qualification'],
        'icon' => 'circle-o text-black',
        'label' => 'Teacher Qualification',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/training'],
        'icon' => 'circle-o text-black',
        'label' => 'Teacher Training',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/vaccination'],
        'icon' => 'circle-o text-black',
        'label' => 'Vaccination',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/examtype'],
        'icon' => 'circle-o text-black',
        'label' => 'Exam Type',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/subject'],
        'icon' => 'circle-o text-black',
        'label' => 'Subject',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/callemaildetail'],
        'icon' => 'circle-o text-black',
        'label' => 'Email',
    ];
	if(Yii::$app->user->identity->role == 'superadmin'):
    if (Yii::$app->user->can('/yadmin/master/qualification/index')):
        $menuItems[] = [
            'icon' => 'cogs',
            'label' => 'Configuration',
            'items' => $developerMenuItems,
        ];
    endif;
    endif;
//Configuration menu end.

    echo app\widgets\Menu::widget([
        'items' => \yii\helpers\ArrayHelper::merge($favouriteMenuItems, $menuItems),
    ]);
    ?>
<?php else: ?>
    <?php
// prepare menu items, get all modules
    $menuItems = [];

    $favouriteMenuItems[] = [''];

    $menuItems[] = [
        'url' => ['/yadmin/process/dashboard'],
        'icon' => 'dashboard',
        'label' => 'डॅशबोर्ड',
    ];

    $menuItems[] = [
        'url' => ['/yadmin/process/school'],
        'icon' => 'building',
        'label' => 'शाळेची माहिती',
    ];

    $menuItems[] = [
        'url' => ['/yadmin/process/academicyear'],
        'icon' => 'calendar-o',
        'label' => 'शैक्षणिक वर्ष कॉन्फिगरेशन.',
    ];

// Student Information Start

    $siMenuItems = [];
    $siMenuItems[] = [
        'url' => ['/yadmin/process/student'],
        'icon' => 'circle-o text-black',
        'label' => 'विद्यार्थ्यांचा तपशील',
    ];
    $siMenuItems[] = [
        'url' => ['/yadmin/process/student/schoolinghistory'],
        'icon' => 'circle-o text-black',
        'label' => 'शालेय इतिहास',
    ];
    $siMenuItems[] = [
        'url' => ['/yadmin/process/studentperformance'],
        'icon' => 'circle-o text-black',
        'label' => 'विद्यार्थ्यांची कामगिरी',
    ];
    if (Yii::$app->user->can('/yadmin/process/student/marks')):
        $siMenuItems[] = [
            'url' => ['/yadmin/process/student/marks'],
            'icon' => 'circle-o text-black',
            'label' => 'विद्यार्थी गुण',
        ];
    endif;
    if (Yii::$app->user->can('/yadmin/process/studentmarks/index')):
        $siMenuItems[] = [
            'url' => ['/yadmin/process/studentmarks/index'],
            'icon' => 'circle-o text-black',
            'label' => 'विद्यार्थी गुण',
        ];
    endif;

    $siMenuItems[] = [
        'url' => ['/yadmin/process/studentcourseenrolled'],
        'icon' => 'circle-o text-black',
        'label' => 'अभ्यासक्रम / प्रशिक्षण',
    ];
    $siMenuItems[] = [
        'url' => ['/yadmin/process/labusage'],
        'icon' => 'circle-o text-black',
        'label' => 'लॅब उपस्थिती',
    ];
    $siMenuItems[] = [
        'url' => ['/yadmin/process/studenthealth'],
        'icon' => 'circle-o text-black',
        'label' => 'विद्यार्थी आरोग्य',
    ];

    $siMenuItems[] = [
        'url' => ['/yadmin/process/studentattendance'],
        'icon' => 'circle-o text-black',
        'label' => 'विद्यार्थ्यांची उपस्थिती',
    ];
    $siMenuItems[] = [
        'url' => ['/yadmin/process/studentbirthday'],
        'icon' => 'circle-o text-black',
        'label' => 'विद्यार्थी वाढदिवस',
    ];



    $menuItems[] = [
        'icon' => 'id-card-o',
        'label' => 'विद्यार्थ्यांची माहिती',
        'items' => $siMenuItems,
    ];

// Student Information Close
// Staff Information Start

    $TFLMenuItems = [];
    $TFLMenuItems[] = [
        'url' => ['/yadmin/process/empdetail'],
        'icon' => 'circle-o text-black',
        'label' => 'कर्मचार्‍यांचा तपशील',
    ];
    $TFLMenuItems[] = [
        'url' => ['/yadmin/process/teachertraining'],
        'icon' => 'circle-o text-black',
        'label' => 'कर्मचारी प्रशिक्षण तपशील',
    ];
    $TFLMenuItems[] = [
        'url' => ['/yadmin/process/teacherlecturedelivered'],
        'icon' => 'circle-o text-black',
        'label' => 'व्याख्याने दिली',
    ];
    $TFLMenuItems[] = [
        'url' => ['/yadmin/process/teacherattendance'],
        'icon' => 'circle-o text-black',
        'label' => 'कर्मचार्‍यांची उपस्थिती',
    ];
    $TFLMenuItems[] = [
        'url' => ['/yadmin/process/teacherleaverecord'],
        'icon' => 'circle-o text-black',
        'label' => 'कर्मचारी रजा रेकॉर्ड',
    ];
    $menuItems[] = [
        'icon' => 'users',
        'label' => 'कर्मचार्‍यांची माहिती',
        'items' => $TFLMenuItems,
    ];

// Staff Information Close
// Staff Information Start

    $TMFLMenuItems = [];
    $TMFLMenuItems[] = [
        'url' => ['/yadmin/process/teachertraining/list'],
        'icon' => 'circle-o text-black',
        'label' => 'कर्मचारी प्रशिक्षण तपशील',
    ];
    $TMFLMenuItems[] = [
        'url' => ['/yadmin/process/teacherfeedback'],
        'icon' => 'circle-o text-black',
        'label' => 'शिक्षकांचा अभिप्राय',
    ];

    $TMFLMenuItems[] = [
        'url' => ['/yadmin/process/studentcourseenrolled/list'],
        'icon' => 'circle-o text-black',
        'label' => 'विद्यार्थी प्रशिक्षण नोंदणी',
    ];

    $TMFLMenuItems[] = [
        'url' => ['/yadmin/process/studentfeedback'],
        'icon' => 'circle-o text-black',
        'label' => 'विद्यार्थ्यांचा अभिप्राय',
    ];

    $menuItems[] = [
        'icon' => 'list',
        'label' => 'प्रशिक्षण मॉड्यूल अभिप्राय',
        'items' => $TMFLMenuItems,
    ];

// Staff Information Close
// Staff Information Start

    $LIFLMenuItems = [];
    $LIFLMenuItems[] = [
        'url' => ['/yadmin/process/schoolcomputerlab'],
        'icon' => 'circle-o text-black',
        'label' => 'संगणक प्रयोगशाळा',
    ];

    $LIFLMenuItems[] = [
        'url' => ['/yadmin/process/schoolstemlab'],
        'icon' => 'circle-o text-black',
        'label' => 'स्टेम लॅब',
    ];

    $LIFLMenuItems[] = [
        'url' => ['/yadmin/process/updowntime'],
        'icon' => 'circle-o text-black',
        'label' => 'अपटाइम आणि डाउनटाइम ',
    ];

    $LIFLMenuItems[] = [
        'url' => ['/yadmin/process/acceptancetest'],
        'icon' => 'circle-o text-black',
        'label' => 'स्वीकृती चाचणी',
    ];

    $LIFLMenuItems[] = [
        'url' => ['/yadmin/process/asset/index'],
        'icon' => 'circle-o text-black',
        'label' => 'मालमत्ता तपशील',
    ];

//if (Yii::$app->user->can('/yadmin/process/asset/upload')):
//    $labAsssetMenuItems[] = [
//        'url' => ['/yadmin/process/asset/upload'],
//        'icon' => 'circle-o text-purple',
//        'label' => 'Asset Bulk Upload',
//    ];
//endif;
    $menuItems[] = [
        'url' => ['/yadmin/process/sportsactivity'],
        'icon' => 'life-buoy',
        'label' => 'क्रीडा क्रियाकलाप',
    ];
    $menuItems[] = [
        'icon' => 'flask',
        'label' => 'लॅब इन्फ्रास्ट्रक्चर',
        'items' => $LIFLMenuItems,
    ];

// Staff Information Close
//  Call Log Start
    $calllogMenuItems = [];
    if (Yii::$app->user->can('/yadmin/process/assetticket/create')):
        $calllogMenuItems[] = [
            'url' => ['/yadmin/process/assetticket/create'],
            'icon' => 'circle-o text-black',
            'label' => 'फॉल्ट लॉगिंग',
        ];
    endif;
    $calllogMenuItems[] = [
        'url' => ['/yadmin/process/assetticket/index'],
        'icon' => 'circle-o text-black',
        'label' => 'निराकरण तपशील',
    ];
    $calllogMenuItems[] = [
        'url' => ['/yadmin/process/faq/index'],
        'icon' => 'circle-o text-black',
        'label' => 'सामान्य प्रश्न',
    ];
    $menuItems[] = [
        'icon' => 'phone',
        'label' => 'मदत डेस्क आणि फॉल्ट लॉगिंग',
        'items' => $calllogMenuItems,
    ];
//  Call Log Close
// Records Start

    $reportMenuItems = [];
    $reportMenuItems[] = [
        'url' => ['/yadmin/process/report/classwise'],
        'icon' => 'file',
        'label' => 'विद्यार्थ्यांचा अहवाल',
        'items' => [
            [
                'url' => ['/yadmin/process/report/classwise'],
                'icon' => 'circle-o text-black',
                'label' => 'वर्गवार',
            ],
            [
                'url' => ['/yadmin/process/report/religionwise'],
                'icon' => 'circle-o text-black',
                'label' => 'धर्मनिहाय',
            ],
            [
                'url' => ['/yadmin/process/report/boygirlsratio'],
                'icon' => 'circle-o text-black',
                'label' => 'मुले / मुलींचे प्रमाण',
            ],
            [
                'url' => ['/yadmin/process/report/rte'],
                'icon' => 'circle-o text-black',
                'label' => 'आरटीई अहवाल',
            ],
            [
                'url' => ['/yadmin/process/report/sectionwise'],
                'icon' => 'circle-o text-black',
                'label' => 'विभागवार',
            ],
//        [
//            'url' => ['/yadmin/process/report/gradewise'],
//            'icon' => 'circle-o text-green',
//            'label' => 'Grade Wise',
//        ],
        ]
    ];

    $reportMenuItems[] = [
        'url' => ['/yadmin/process/report/subjectwise'],
        'icon' => 'file',
        'label' => 'शिक्षक अहवाल',
        'items' => [
            [
                'url' => ['/yadmin/process/report/qualificationwise'],
                'icon' => 'circle-o text-black',
                'label' => 'पात्रता निहाय',
            ],
            [
                'url' => ['/yadmin/process/report/subjectwise'],
                'icon' => 'circle-o text-black',
                'label' => 'विषयवार',
            ],
            [
                'url' => ['/yadmin/process/report/departmentwise'],
                'icon' => 'circle-o text-black',
                'label' => 'विभागवार',
            ],
            [
                'url' => ['/yadmin/process/report/salarywise'],
                'icon' => 'circle-o text-black',
                'label' => 'वेतन गट निहाय',
            ],
        ]
    ];

    $reportMenuItems[] = [
        'url' => ['/yadmin/process/report/studentattendance'],
        'icon' => 'file',
        'label' => 'उपस्थिती अहवाल',
        'items' => [
            [
                'url' => ['/yadmin/process/report/studentattendance'],
                'icon' => 'circle-o text-black',
                'label' => 'विद्यार्थ्यांची उपस्थिती',
            ],
            [
                'url' => ['/yadmin/process/report/tattendance'],
                'icon' => 'circle-o text-black',
                'label' => 'शिक्षकांची उपस्थिती',
            ],
            [
                'url' => ['/yadmin/process/report/insattendance'],
                'icon' => 'circle-o text-black',
                'label' => 'प्रशिक्षकांची उपस्थिती',
            ],
            [
                'url' => ['/yadmin/process/report/visittendance'],
                'icon' => 'circle-o text-black',
                'label' => 'भेट देणारी विद्याशाखा',
            ],
        ]
    ];

    $reportMenuItems[] = [
        'url' => ['/yadmin/process/report/classwise'],
        'icon' => 'file',
        'label' => 'विद्यार्थी परीक्षा अहवाल',
        'items' => [
            [
                'url' => ['/yadmin/process/classwisereport/index'],
                'icon' => 'circle-o text-black',
                'label' => 'वर्गवार',
            ],
//        [
//            'url' => ['/yadmin/process/report/gradewisereport'],
//            'icon' => 'circle-o text-green',
//            'label' => 'Grade Wise',
//        ],
            [
                'url' => ['/yadmin/process/classwisereport/boysvsgirls'],
                'icon' => 'circle-o text-black',
                'label' => 'मुले / मुलींचे प्रमाण',
            ],
            [
                'url' => ['/yadmin/process/report/subjectwisereport'],
                'icon' => 'circle-o text-black',
                'label' => 'विषयवार',
            ],
            [
                'url' => ['/yadmin/process/report/onlinemarksgenerate'],
                'icon' => 'circle-o text-black',
                'label' => 'मार्कशीट व्युत्पन्न करा',
            ]
        ]
    ];
    $reportMenuItems[] = [
        'url' => ['/yadmin/process/report/labreport'],
        'icon' => 'file',
        'label' => 'लॅब मालमत्ता अहवाल',
        'items' => [
            [
                'url' => ['/yadmin/process/report/labreport'],
                'icon' => 'circle-o text-black',
                'label' => 'लॅब तपशील',
            ],
            [
                'url' => ['/yadmin/process/report/slareport'],
                'icon' => 'circle-o text-black',
                'label' => 'एसएलए पालन',
            ],
            [
                'url' => ['/yadmin/process/report/udtime'],
                'icon' => 'circle-o text-black',
                'label' => 'अपटाइम / डाउनटाइम',
            ],
            [
                'url' => ['/yadmin/process/report/itemtracking'],
                'icon' => 'circle-o text-black',
                'label' => 'आयटम ट्रॅकिंग',
            ],
            [
                'url' => ['/yadmin/process/report/internetspeed'],
                'icon' => 'circle-o text-black',
                'label' => 'इंटरनेट गती',
            ]
        ]
    ];

    $reportMenuItems[] = [
        'url' => ['/yadmin/process/report/openticket'],
        'icon' => 'file',
        'label' => 'मदत कक्ष',
        'items' => [
            [
                'url' => ['/yadmin/process/report/openticket'],
                'icon' => 'circle-o text-black',
                'label' => 'तिकिटे उघडा',
            ],
            [
                'url' => ['/yadmin/process/report/closeticket'],
                'icon' => 'circle-o text-black',
                'label' => 'बंद तिकिटे',
            ],
            [
                'url' => ['/yadmin/process/report/inprocessticket'],
                'icon' => 'circle-o text-black',
                'label' => 'एस्केलेटेड तिकिटे',
            ],
            [
                'url' => ['/yadmin/process/report/catwiseticket'],
                'icon' => 'circle-o text-black',
                'label' => 'प्रवर्गनिहाय तिकिटे',
            ]
        ]
    ];
    $menuItems[] = [
        'icon' => 'file',
        'label' => 'अहवाल',
        'items' => $reportMenuItems,
    ];
// Report Close
//User menu start.
    $UsermenuItems = [];
    $UsermenuItems[] = [
        'url' => ['/yadmin/process/empdetails/index'],
        'icon' => 'circle-o text-black',
        'label' => 'प्रोफाइल',
    ];
    $UsermenuItems[] = [
        'url' => ['/yadmin/process/schooldcmapping'],
        'icon' => 'circle-o text-black',
        'label' => 'स्कूल मॅपिंग',
    ];
    if (Yii::$app->user->can('/yadmin/user/admin/index')):
        $UsermenuItems[] = [
            'url' => ['/yadmin/user'],
            'icon' => 'circle-o text-black',
            'label' => 'वापरकर्ता व्यवस्थापन',
        ];
    endif;
    if (Yii::$app->user->can('/yadmin/process/empdetails/index')):
        $menuItems[] = [
            'icon' => 'user',
            'label' => 'वापरकर्ता व्यवस्थापन',
            'items' => $UsermenuItems,
        ];
    endif;

//User menu end

    $menuItems[] = [
        'url' => ['/yadmin/process/communication'],
        'icon' => 'commenting',
        'label' => 'संप्रेषण व्यवस्थापन',
    ];

// Records Upload Start

    $uploadMenuItems = [];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/student/stuprofile'],
        'icon' => 'circle-o text-black',
        'label' => 'विद्यार्थी अपलोड',
    ];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/studentperformance/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'कामगिरी अपलोड',
    ];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/studentmarks/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'विद्यार्थी गुण अपलोड',
    ];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/studenthealth/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'विद्यार्थी आरोग्य अपलोड',
    ];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/studentattendance/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'विद्यार्थ्यांची उपस्थिती',
    ];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/teacherlecturedelivered/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'शिक्षक व्याख्यान वितरीत',
    ];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/teacherattendance/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'कर्मचार्‍यांची उपस्थिती',
    ];    
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/labusage/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'लॅब उपस्थिती',
    ];
    $uploadMenuItems[] = [
        'url' => ['/yadmin/process/teacherleaverecord/upload'],
        'icon' => 'circle-o text-black',
        'label' => 'शिक्षक रिकामे रेकॉर्ड',
    ];
    if (Yii::$app->user->can('/yadmin/process/student/stuprofile')):
        $menuItems[] = [
            'icon' => 'upload',
            'label' => 'बल्क अपलोड',
            'items' => $uploadMenuItems,
        ];
    endif;
// Report Upload Close

    $menuItems[] = [
        'url' => ['/yadmin/process/academicplanner'],
        'icon' => 'newspaper-o',
        'label' => 'शैक्षणिक नियोजक',
    ];

    $menuItems[] = [
        'url' => ['/yadmin/process/report/aureport'],
        'icon' => 'window-restore',
        'label' => 'सक्रियकरण आणि उपयोग',
    ];

// Time Table Start

    $timetableMenuItems = [];
    if (Yii::$app->user->can('/yadmin/process/timetable/calender')):
        $timetableMenuItems[] = [
            'url' => ['/yadmin/process/timetable/calender'],
            'icon' => 'circle-o text-black',
            'label' => 'वेळ सारणी पहा',
        ];
    endif;
    $timetableMenuItems[] = [
        'url' => ['/yadmin/process/timetable/index'],
        'icon' => 'circle-o text-black',
        'label' => 'वेळ सारणी व्यवस्थापित करा',
    ];

    if (Yii::$app->user->can('/yadmin/process/timetable/index')):
        $menuItems[] = [
            'icon' => 'calendar',
            'label' => 'टाइम टेबल आणि ट्रॅकिंग',
            'items' => $timetableMenuItems,
        ];
    endif;
// Time table Close

    $itemss[] = [
        'label' => 'अहवाल',
        'url' => ['/yadmin/process/report/post'],
        'icon' => 'circle-o text-black',
        'template' => '<a href="{url}" target="_blank">{label}</a>',
    ];
    $menuItems[] = [
        'icon' => 'dot-circle-o',
        'label' => 'कृत्रिम बुद्धिमत्ता',
        'items' => $itemss,
    ];

    $menuItems[] = [
        'url' => ['/yadmin/process/apigis/index'],
        'icon' => 'info',
        'label' => 'एमआयएस-जीआयएस',
    ];

//Configuration menu start.
    $developerMenuItems = [];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/assetitemcategory'],
        'icon' => 'circle-o text-black',
        'label' => 'मालमत्ता आयटम श्रेणी',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/process/assetitemcategoryissue'],
        'icon' => 'circle-o text-black',
        'label' => 'मालमत्ता वस्तूंचा मुद्दा',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/assetitemmake'],
        'icon' => 'circle-o text-black',
        'label' => 'मालमत्ता आयटम बनवा',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/assetserviceprovider'],
        'icon' => 'circle-o text-black',
        'label' => 'मालमत्ता सेवा प्रदाता',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/qualification'],
        'icon' => 'circle-o text-black',
        'label' => 'शिक्षक पात्रता',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/training'],
        'icon' => 'circle-o text-black',
        'label' => 'शिक्षक प्रशिक्षण',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/vaccination'],
        'icon' => 'circle-o text-black',
        'label' => 'लसीकरण',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/examtype'],
        'icon' => 'circle-o text-black',
        'label' => 'परीक्षेचा प्रकार',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/subject'],
        'icon' => 'circle-o text-black',
        'label' => 'विषय',
    ];
    $developerMenuItems[] = [
        'url' => ['/yadmin/master/callemaildetail'],
        'icon' => 'circle-o text-black',
        'label' => 'ईमेल',
    ];
    if (Yii::$app->user->can('/yadmin/master/qualification/index')):
        $menuItems[] = [
            'icon' => 'cogs',
            'label' => 'कॉन्फिगरेशन',
            'items' => $developerMenuItems,
        ];
    endif;
//Configuration menu end.

    echo app\widgets\Menu::widget([
        'items' => \yii\helpers\ArrayHelper::merge($favouriteMenuItems, $menuItems),
    ]);
    ?>
<?php endif; ?>


