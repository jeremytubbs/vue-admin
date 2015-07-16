<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Template as Template;

class TemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template = new Template();
        $template->name = 'Blog';
        $template->slug = 'Blog';
        $template->description = 'Create a blog post.';
        $template->save();

        $template = new Template();
        $template->name = 'Project';
        $template->slug = 'Project';
        $template->description = 'Create a project post.';
        $template->save();

        $template = new Template();
        $template->name = 'Book';
        $template->slug = 'Book';
        $template->description = 'Create a Book project.';
        $template->save();
    }
}
