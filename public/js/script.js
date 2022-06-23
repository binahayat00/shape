(function () {

  window.onload = function () {
    var triangle = document.getElementById("triangle-submit");
    triangle.onclick = function changeContent() {
      makeRequestForTriangle();
    }

    var circle = document.getElementById("circle-submit");
    circle.onclick = function changeContent() {
      makeRequestForCircle();
    }
  };

  function makeRequestForTriangle() {
    httpRequest = new XMLHttpRequest();

    if (!httpRequest) {
      alert('Giving up :( Cannot create an XMLHTTP instance');
      return false;
    }
    side1 = document.getElementById('side1').value;
    side2 = document.getElementById('side2').value;
    side3 = document.getElementById('side3').value;
    if (side1 && side2 && side3) {
      httpRequest.onreadystatechange = setInputForTriangle;
      httpRequest.open('GET', '/triangle/' + side1 + '/' + side2 + '/' + side3, false);
      httpRequest.send();
    }
  }

  function setInputForTriangle() {
    try {
      if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
          const triangleObject = JSON.parse(JSON.parse(httpRequest.responseText));
          document.getElementById('triangle-type').value = triangleObject.type;
          document.getElementById('triangle-diameter').value = triangleObject.diameter;
          document.getElementById('triangle-surface').value = triangleObject.surface;
        } else if (httpRequest.status === 400) {
          alert('This sides can not be a triangle');
        }
        else {
          alert('There was a problem with the request.');
        }
      }
    }
    catch (e) {
      alert('Caught Exception: ' + e.description);
    }
  }

  function makeRequestForCircle() {
    httpRequest = new XMLHttpRequest();

    if (!httpRequest) {
      alert('Giving up :( Cannot create an XMLHTTP instance');
      return false;
    }
    radius = document.getElementById('radius').value;
    if (radius) {
      httpRequest.onreadystatechange = setInputForCircle;
      httpRequest.open('GET', '/circle/' + radius, false);
      httpRequest.send();
    }
  }

  function setInputForCircle() {
    try {
      if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
          const triangleObject = JSON.parse(JSON.parse(httpRequest.responseText));
          document.getElementById('circle-type').value = triangleObject.type;
          document.getElementById('circle-diameter').value = triangleObject.diameter;
          document.getElementById('circle-surface').value = triangleObject.surface;
        } else {
          alert('There was a problem with the request.');
        }
      }
    }
    catch (e) {
      alert('Caught Exception: ' + e.description);
    }
  }

})();