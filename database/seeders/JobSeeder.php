<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample tags
        $tags = [
            'Laravel', 'PHP', 'Vue.js', 'React', 'JavaScript', 'Python', 'Django',
            'Node.js', 'MySQL', 'PostgreSQL', 'MongoDB', 'AWS', 'Docker',
            'Remote', 'Senior', 'Junior', 'Full-stack', 'Frontend', 'Backend',
            'TypeScript', 'GraphQL', 'Kubernetes', 'DevOps', 'API', 'SaaS'
        ];

        foreach ($tags as $tagName) {
            Tag::firstOrCreate(['name' => $tagName]);
        }

        // Create sample users and employers
        $companies = [
            [
                'name' => 'TechCorp Solutions',
                'logo' => 'logos/techcorp.png',
                'description' => 'Leading technology solutions provider specializing in web development and cloud infrastructure.',
                'location' => 'San Francisco, CA',
                'website' => 'https://techcorp.example.com',
                'founded_year' => 2015,
                'company_size' => '51-200'
            ],
            [
                'name' => 'Digital Innovations Ltd',
                'logo' => 'logos/digital-innovations.png',
                'description' => 'Innovative digital agency creating cutting-edge web applications and mobile solutions.',
                'location' => 'New York, NY',
                'website' => 'https://digitalinnovations.example.com',
                'founded_year' => 2018,
                'company_size' => '11-50'
            ],
            [
                'name' => 'StartupXYZ',
                'logo' => 'logos/startupxyz.png',
                'description' => 'Fast-growing startup disrupting the fintech industry with AI-powered solutions.',
                'location' => 'Remote',
                'website' => 'https://startupxyz.example.com',
                'founded_year' => 2020,
                'company_size' => '1-10'
            ],
            [
                'name' => 'CloudNine Systems',
                'logo' => 'logos/cloudnine.png',
                'description' => 'Enterprise cloud solutions provider helping Fortune 500 companies migrate to the cloud.',
                'location' => 'Austin, TX',
                'website' => 'https://cloudnine.example.com',
                'founded_year' => 2012,
                'company_size' => '201-1000'
            ],
            [
                'name' => 'WebCraft Studio',
                'logo' => 'logos/webcraft.png',
                'description' => 'Creative web development studio crafting beautiful and functional websites.',
                'location' => 'Seattle, WA',
                'website' => 'https://webcraft.example.com',
                'founded_year' => 2019,
                'company_size' => '11-50'
            ],
            [
                'name' => 'DataFlow Analytics',
                'logo' => 'logos/dataflow.png',
                'description' => 'Data analytics and machine learning company helping businesses make data-driven decisions.',
                'location' => 'Boston, MA',
                'website' => 'https://dataflow.example.com',
                'founded_year' => 2016,
                'company_size' => '51-200'
            ]
        ];

        foreach ($companies as $companyData) {
            $user = User::create([
                'name' => $companyData['name'] . ' Admin',
                'email' => strtolower(str_replace([' ', '&'], ['', 'and'], $companyData['name'])) . '@example.com',
                'password' => bcrypt('password')
            ]);

            $employer = $user->employer()->create($companyData);
            $this->createJobsForEmployer($employer);
        }
    }

    private function createJobsForEmployer(Employer $employer)
    {
        $jobTitles = [
            'Senior Laravel Developer',
            'Frontend Vue.js Developer',
            'Full Stack PHP Developer',
            'DevOps Engineer',
            'Senior React Developer',
            'Backend Python Developer',
            'Mobile App Developer',
            'Data Scientist',
            'Quality Assurance Engineer',
            'Technical Lead'
        ];

        $locations = ['Remote', 'San Francisco, CA', 'New York, NY', 'Austin, TX', 'Seattle, WA', 'Boston, MA'];
        $salaries = [
            '$70,000 - $90,000',
            '$80,000 - $120,000',
            '$90,000 - $130,000',
            '$100,000 - $150,000',
            '$120,000 - $180,000'
        ];
        $schedules = ['Full Time', 'Part Time'];

        $jobCount = rand(3, 6);
        $selectedTitles = array_slice($jobTitles, 0, $jobCount);

        foreach ($selectedTitles as $title) {
            $job = $employer->jobs()->create([
                'title' => $title,
                'salary' => $salaries[array_rand($salaries)],
                'location' => $locations[array_rand($locations)],
                'schedule' => $schedules[array_rand($schedules)],
                'url' => 'https://' . strtolower(str_replace([' ', '&'], ['', 'and'], $employer->name)) . '.example.com/careers',
                'description' => $this->generateJobDescription($title),
                'featured' => rand(0, 4) === 0, // 20% chance
            ]);

            // Attach relevant tags
            $relevantTags = $this->getRelevantTags($title);
            $allTags = Tag::whereIn('name', $relevantTags)->get();
            $job->tags()->attach($allTags->random(min(rand(3, 5), $allTags->count())));
        }
    }

    private function getRelevantTags($title)
    {
        $tagMap = [
            'Senior Laravel Developer' => ['Laravel', 'PHP', 'MySQL', 'Senior', 'Backend', 'API'],
            'Frontend Vue.js Developer' => ['Vue.js', 'JavaScript', 'Frontend', 'TypeScript'],
            'Full Stack PHP Developer' => ['PHP', 'Laravel', 'JavaScript', 'Full-stack', 'MySQL'],
            'DevOps Engineer' => ['DevOps', 'AWS', 'Docker', 'Kubernetes'],
            'Senior React Developer' => ['React', 'JavaScript', 'Frontend', 'Senior', 'TypeScript'],
            'Backend Python Developer' => ['Python', 'Django', 'Backend', 'API', 'PostgreSQL'],
            'Mobile App Developer' => ['JavaScript', 'React'],
            'Data Scientist' => ['Python', 'MongoDB'],
            'Quality Assurance Engineer' => ['JavaScript'],
            'Technical Lead' => ['Senior', 'Full-stack']
        ];

        return $tagMap[$title] ?? ['JavaScript', 'Frontend'];
    }

    private function generateJobDescription($title)
    {
        $descriptions = [
            'Senior Laravel Developer' => 'We are looking for an experienced Laravel developer to join our growing team. You will be responsible for developing and maintaining high-quality web applications using the Laravel framework.',

            'Frontend Vue.js Developer' => 'Join our frontend team as a Vue.js developer! You will work on creating responsive and interactive user interfaces for our web applications.',

            'Full Stack PHP Developer' => 'We need a versatile full-stack developer comfortable working with both frontend and backend technologies. You will be working with PHP, Laravel, JavaScript, and Vue.js.',

            'DevOps Engineer' => 'Help us scale our infrastructure as a DevOps engineer. You will work with AWS, Docker, Kubernetes, and various CI/CD tools to automate deployments.',

            'Senior React Developer' => 'We are seeking a senior React developer to join our frontend team. You will be responsible for building complex user interfaces using React and Redux.',

            'Backend Python Developer' => 'Join our backend team as a Python developer. You will work with Django, Flask, and various databases to build robust APIs and backend services.',

            'Mobile App Developer' => 'We are looking for a talented mobile app developer to create amazing mobile experiences using React Native or native development.',

            'Data Scientist' => 'Join our data team to help extract insights from large datasets. You will work with Python and machine learning libraries to build predictive models.',

            'Quality Assurance Engineer' => 'Ensure the quality of our software products as a QA engineer. You will design test cases and perform manual and automated testing.',

            'Technical Lead' => 'Lead a team of developers and drive technical decisions for our projects. You should have strong leadership skills and extensive development experience.'
        ];

        return $descriptions[$title] ?? 'Exciting opportunity to join our team and work on challenging projects with cutting-edge technologies.';
    }
}
