from django.shortcuts import render

def index(request):
    return render(request, 'nikitha/home.html')

def contact(request):
    return render(request, 'nikitha/basic.html', {'content':["hey!! if you want to cantact me ",'7996573530']})
