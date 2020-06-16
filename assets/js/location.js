function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
    
function showPosition(position) {
    document.getElementById("lats").value=+position.coords.latitude; 
    document.getElementById("longs").value=+position.coords.longitude;
}