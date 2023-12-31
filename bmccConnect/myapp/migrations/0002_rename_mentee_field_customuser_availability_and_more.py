# Generated by Django 4.2.3 on 2023-07-10 14:35

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('myapp', '0001_initial'),
    ]

    operations = [
        migrations.RenameField(
            model_name='customuser',
            old_name='mentee_field',
            new_name='availability',
        ),
        migrations.AddField(
            model_name='customuser',
            name='emplid',
            field=models.CharField(blank=True, max_length=255),
        ),
        migrations.AddField(
            model_name='customuser',
            name='major',
            field=models.CharField(blank=True, max_length=255),
        ),
        migrations.AddField(
            model_name='customuser',
            name='mhfa_certification',
            field=models.CharField(blank=True, max_length=255),
        ),
        migrations.AddField(
            model_name='customuser',
            name='preferred_language',
            field=models.CharField(blank=True, max_length=255),
        ),
        migrations.AddField(
            model_name='customuser',
            name='rsvp_session',
            field=models.CharField(blank=True, max_length=255),
        ),
        migrations.AddField(
            model_name='customuser',
            name='training_availability',
            field=models.CharField(blank=True, max_length=255),
        ),
        migrations.AlterField(
            model_name='customuser',
            name='email',
            field=models.EmailField(blank=True, max_length=254),
        ),
        migrations.AlterField(
            model_name='customuser',
            name='first_name',
            field=models.CharField(blank=True, max_length=255),
        ),
        migrations.AlterField(
            model_name='customuser',
            name='last_name',
            field=models.CharField(blank=True, max_length=255),
        ),
    ]
