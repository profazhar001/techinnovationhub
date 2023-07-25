from django.contrib.auth.models import AbstractUser
from django.db import models

class CustomUser(AbstractUser):
    is_mentor = models.BooleanField(default=False)
    is_mentee = models.BooleanField(default=False)
    mentor_field = models.CharField(max_length=255, blank=True)
    availability = models.CharField(max_length=255, blank=True)
    emplid = models.CharField(max_length=255, blank=True)
    mhfa_certification = models.CharField(max_length=255, blank=True)
    email = models.EmailField(blank=True)
    first_name = models.CharField(max_length=255, blank=True)
    last_name = models.CharField(max_length=255, blank=True)
    major = models.CharField(max_length=255, blank=True)
    preferred_language = models.CharField(max_length=255, blank=True)
    clubs = models.ManyToManyField('clubs.Club', related_name='members')
    
    def save(self, *args, **kwargs):
        if self.is_mentor:
            self.availability = ''
            self.emplid = ''
            self.mhfa_certification = ''
        if self.is_mentee:
            self.availability = ''
            self.emplid = ''
        super().save(*args, **kwargs)
    def is_mentor_or_mentee(self):

        return self.is_mentor or self.is_mentee
    
class Mentee(models.Model):
    email = models.EmailField(verbose_name='Mentee Email')
    first_name = models.CharField(max_length=100, verbose_name='Mentee First Name')
    last_name = models.CharField(max_length=100, verbose_name='Mentee Last Name')
    emplid = models.IntegerField(default=0, verbose_name='EmplID')
    major = models.CharField(max_length=100, verbose_name='Mentee Major')
    preferred_language = models.CharField(max_length=100, verbose_name='Preferred Language')
    availability = models.CharField(max_length=255, blank=True)

    user = models.OneToOneField(CustomUser, default=None, null=True, on_delete=models.CASCADE, related_name='mentee')

    def __str__(self):
        return f"{self.user.username} - Mentee"

class Mentor(models.Model):
    first_name = models.CharField(max_length=100, verbose_name='Mentor First Name')
    last_name = models.CharField(max_length=100, verbose_name='Mentor Last Name')
    emplid = models.IntegerField(default=0, verbose_name='EmplID')
    major = models.CharField(default='N/A', max_length=100, verbose_name='Mentor Major')
    mhfa_certification = models.CharField(max_length=255, blank=True)
    preferred_language = models.CharField(default="English", max_length=100, verbose_name='Preferred Language') 
    availability = models.CharField(max_length=255, blank=True)

    user = models.OneToOneField(CustomUser, default=None, null=True, on_delete=models.CASCADE, related_name='mentor')

    def __str__(self):
        return f"{self.user.username} - Mentor"


class Match(models.Model):
    mentor = models.ForeignKey('myapp.Mentor', on_delete=models.CASCADE, related_name='matches')
    mentee = models.ForeignKey('myapp.Mentee', on_delete=models.CASCADE, related_name='matches')
    created_at = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return f"Mentor: {self.mentor}, Mentee: {self.mentee}"
    
