$(function () {
  let alreadyFilled = false;
  function initDialog() {
    clearDialog();
    for (var i = 0; i < places.length; i++) {
      $(".dialog").append("<div>" + places[i] + "</div>");
    }
  }
  function clearDialog() {
    $(".dialog").empty();
  }
  $(".autocomplete input").click(function () {
    if (!alreadyFilled) {
      $(".dialog").addClass("open");
    }
  });
  $("body").on("click", ".dialog > div", function () {
    $(".autocomplete input").val($(this).text()).focus();
    $(".autocomplete .close").addClass("visible");
    alreadyFilled = true;
    let filteredRegion = regionJSON.features.filter(
      (feature) =>
        feature.properties.place_name.real_name === $(this).text() ||
        feature.properties.place_name.zawgyi === $(this).text() ||
        feature.properties.place_name.unicode === $(this).text()
    );
    if (filteredRegion.length > 0) {
      map.flyTo({
        center: filteredRegion[0].geometry.coordinates,
        zoom: 7,
        essential: true, // this animation is considered essential with respect to prefers-reduced-motion
      });
      let currentHospitals = hospitalJSON.features.filter((hospital) => {
        return (
          hospital.properties.region ==
          filteredRegion[0].properties.place_name.db_name
        );
      });
      currentHospitals.length > 0 && createPopUp(currentHospitals[0]);
    } else {
      let filteredTownship = townshipJSON.features.filter(
        (feature) => feature.properties.place_name.real_name === $(this).text()
      );
      if (filteredTownship.length > 0) {
        map.flyTo({
          center: filteredTownship[0].geometry.coordinates,
          zoom: 8,
          essential: true, // this animation is considered essential with respect to prefers-reduced-motion
        });
        let currentHospitals = hospitalJSON.features.filter((hospital) => {
          return (
            hospital.properties.township ==
            filteredTownship[0].properties.place_name.db_name
          );
        });
        currentHospitals.length > 0 && createPopUp(currentHospitals[0]);
      } else {
        let filteredHospital = hospitalJSON.features.filter(
          (feature) =>
            feature.properties.place_name.real_name === $(this).text()
        );
        map.flyTo({
          center: filteredHospital[0].geometry.coordinates,
          zoom: 10,
          essential: true, // this animation is considered essential with respect to prefers-reduced-motion
        });
        createPopUp(filteredHospital[0]);
      }
    }
  });
  $(".autocomplete .close").click(function () {
    alreadyFilled = false;
    initDialog();
    $(".dialog").addClass("open");
    $(".autocomplete input").val("").focus();
    $(this).removeClass("visible");
    map.flyTo({
      center: [95.955971, 21.916222],
      zoom: 6,
      essential: true, // this animation is considered essential with respect to prefers-reduced-motion
    });
  });

  function match(str) {
    str = str.toLowerCase();
    clearDialog();
    for (var i = 0; i < places.length; i++) {
      if (places[i].toLowerCase().startsWith(str)) {
        $(".dialog").append("<div>" + places[i] + "</div>");
      }
    }
  }
  $(".autocomplete input").on("input", function () {
    $(".dialog").addClass("open");
    alreadyFilled = false;
    match($(this).val());
  });
  $("body").click(function (e) {
    if (!$(e.target).is("input, .close")) {
      $(".dialog").removeClass("open");
    }
  });
  initDialog();
});
