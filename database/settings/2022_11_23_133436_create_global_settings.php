<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGlobalSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.seo_title', 'PrimAjutor');
        $this->migrator->add('general.seo_description', 'Prim Ajutor');
        $this->migrator->add('general.seo_keywords', 'Prim Ajutor');
        $this->migrator->add('general.contact_email', '');
        $this->migrator->add('general.facebook', '');
        $this->migrator->add('general.instagram', '');
        $this->migrator->add('general.youtube', '');
    }
}
