<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post')->insert([
            'title' => 'Code Smells',
            'shortDescription' => 'In computer programming, a code smell is any characteristic...',
            'description' => 'One way to look at smells is with respect to principles and quality: "Smells are certain structures in the code that indicate violation of fundamental design principles and negatively impact design quality".[6] Code smells are usually not bugs; they are not technically incorrect and do not prevent the program from functioning. Instead, they indicate weaknesses in design that may slow down development or increase the risk of bugs or failures in the future. Bad code smells can be an indicator of factors that contribute to technical debt.[1]
             Robert C. Martin calls a list of code smells a "value system" for software craftsmanship.[7]
Often the deeper problem hinted at by a code smell can be uncovered when the code is subjected to a short feedback cycle, where it is refactored in small, controlled steps, and the resulting design is examined to see if there are any further code smells that in turn indicate the need for more refactoring. From the point of view of a programmer charged with performing refactoring, code smells are heuristics to indicate when to refactor, and what specific refactoring techniques to use. Thus, a code smell is a driver for refactoring.

A 2015 study[1] utilizing automated analysis for half a million source code commits and the manual examination of 9,164 commits determined to exhibit "code smells" found that:

There exists empirical evidence for the consequences of "technical debt", but there exists only anecdotal evidence as to how, when, or why this occurs.
"Common wisdom suggests that urgent maintenance activities and pressure to deliver features while prioritizing time-to-market over code quality are often the causes of such smells".
Tools such as Checkstyle, PMD, FindBugs, and SonarQube can automatically identify code smells.',
            'meta' => 'Code Smells meta',
            'urlSlug' => 'Code_Smells_url',
            'published' => true,
            'postedOn' => Carbon::now()->format('Y-m-d H:i:s'),
            'category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);//
        DB::table('post')->insert([
            'title' => 'A tour to HTML5',
            'shortDescription' => 'HTML5 is the latest evolution of the standard HTML.  ',
            'description' => 'HTML5 is the latest evolution of the standard that defines HTML. The term represents two different concepts. It is a new version of the language HTML, with new elements, attributes, and behaviors, and a larger set of technologies that allows the building of more diverse and powerful Web sites and applications. This set is sometimes called HTML5 & friends and often shortened to just HTML5.

Designed to be usable by all Open Web developers, this reference page links to numerous resources about HTML5 technologies, classified into several groups based on their function.

Semantics: allowing you to describe more precisely what your content is.
Connectivity: allowing you to communicate with the server in new and innovative ways.
Offline and storage: allowing webpages to store data on the client-side locally and operate offline more efficiently.
Multimedia: making video and audio first-class citizens in the Open Web.
2D/3D graphics and effects: allowing a much more diverse range of presentation options.
Performance and integration: providing greater speed optimization and better usage of computer hardware.
Device access: allowing for the usage of various input and output devices.
Styling: letting authors write more sophisticated themes.',
            'meta' => 'A tour to HTML5 meta',
            'urlSlug' => 'A_tour_to_HTML5url',
            'published' => true,
            'postedOn' => Carbon::now()->format('Y-m-d H:i:s'),
            'category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);//
    }
}
