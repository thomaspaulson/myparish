<?php
class SectionManager implements TemplateGlobalProvider
{
    /**
    * @return array|void
    */
    public static function get_template_global_variables()
    {
        return array(
            'RecentBrith' => 'ListRecentBirth',
            'RecentDeath' => 'ListRecentDeath',
        );
    }
    
    public static function ListRecentBirth()
    {
        $template = new SSViewer('ListRecentBirth');
      
        $controller = new BirthController();
        
        
        $recentBrith = $controller->RecentBrith();
        
        // a little bit all over the show but to ensure a slightly easier upgrade for users
        // return back the same variables as previously done in comments
        return $template->process(new ArrayData(array(
            'RecentBrith'    => $recentBrith,
            'AddLink'    => $controller->Link('add')
        )));
    }
    
    public static function ListRecentDeath()
    {
        $template = new SSViewer('ListRecentDeath');
      
        $controller = new DeathController();
        
        
        $recentDeath = $controller->RecentDeath();
        
        // a little bit all over the show but to ensure a slightly easier upgrade for users
        // return back the same variables as previously done in comments
        return $template->process(new ArrayData(array(
            'RecentDeath'    => $recentDeath,
            'AddLink'    => $controller->Link('add')
        )));
    }
    
}