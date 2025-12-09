import $ from "jquery";

function initContactScrollLink() {
	const contactLinkElement = $(".contact__link");

	if (!contactLinkElement.length) {
		return;
	}

	contactLinkElement.on("click", function (eventObject) {
		eventObject.preventDefault();

		const mapElement = $("#map");

		if (!mapElement.length) {
			return;
		}

		$("html, body").animate(
			{
				scrollTop: mapElement.offset().top,
			},
			500
		);
	});
}

function initContactTabs() {
	const contactElement = $(".contact");

	if (!contactElement.length) {
		return;
	}

	const countryButtonElements = $(".contact__country-button");
	const locationsGroupElements = $(".contact__location-tabs-group");
	const locationButtonElements = $(".contact__location-button");
	const locationPanelElements = $(".contact-location-panel");

	countryButtonElements.on("click", function () {
		const clickedCountryButtonElement = $(this);
		const countryKeyString = clickedCountryButtonElement.data("country");

		countryButtonElements.removeClass("is-active");
		clickedCountryButtonElement.addClass("is-active");

		locationsGroupElements.each(function () {
			const locationsGroupElement = $(this);
			const groupCountryKeyString = locationsGroupElement.data("country");

			if (groupCountryKeyString === countryKeyString) {
				locationsGroupElement.addClass("is-active");
			} else {
				locationsGroupElement.removeClass("is-active");
			}
		});

		const firstLocationButtonElement = $(
			".contact__location-tabs-group.is-active .contact__location-button"
		).first();

		if (firstLocationButtonElement.length) {
			firstLocationButtonElement.trigger("click");
		}
	});

	locationButtonElements.on("click", function () {
		const clickedLocationButtonElement = $(this);
		const locationIdString = clickedLocationButtonElement.data("locationId");

		$(".contact__location-button").removeClass("is-active");
		clickedLocationButtonElement.addClass("is-active");

		locationPanelElements.each(function () {
			const locationPanelElement = $(this);
			const panelLocationIdString = locationPanelElement.data("locationId");

			if (panelLocationIdString === locationIdString) {
				locationPanelElement.addClass("is-active");
			} else {
				locationPanelElement.removeClass("is-active");
			}
		});

		if (window.updateContactMapLocation) {
			window.updateContactMapLocation(locationIdString);
		}

		const windowWidthNumber = window.innerWidth || $(window).width();

		if (windowWidthNumber <= 1199) {
			const tabsElement = $(".contact__tabs").first();

			if (tabsElement.length) {
				const targetTopNumber = tabsElement.offset().top - 30;

				$("html, body").stop(true).animate(
					{
						scrollTop: targetTopNumber,
					},
					400
				);
			}
		}
	});

	const defaultLocationButtonElement = $(
		".contact__location-button.is-active"
	).first();

	if (defaultLocationButtonElement.length) {
		defaultLocationButtonElement.trigger("click");
	}
}

let contactMapObject = null;
let contactMapMarkerObject = null;
let contactMapGeocoderObject = null;
let contactMapLocationsByIdObject = {};

function getContactMapStylesArray() {
	const stylesArray = [
		{
			elementType: "geometry",
			stylers: [
				{
					color: "#f5f5f5",
				},
			],
		},
		{
			elementType: "labels.icon",
			stylers: [
				{
					visibility: "off",
				},
			],
		},
		{
			elementType: "labels.text.fill",
			stylers: [
				{
					color: "#616161",
				},
			],
		},
		{
			elementType: "labels.text.stroke",
			stylers: [
				{
					color: "#f5f5f5",
				},
			],
		},
		{
			featureType: "administrative.land_parcel",
			elementType: "labels.text.fill",
			stylers: [
				{
					color: "#bdbdbd",
				},
			],
		},
		{
			featureType: "poi",
			elementType: "geometry",
			stylers: [
				{
					color: "#eeeeee",
				},
			],
		},
		{
			featureType: "poi",
			elementType: "labels.text.fill",
			stylers: [
				{
					color: "#757575",
				},
			],
		},
		{
			featureType: "road",
			elementType: "geometry",
			stylers: [
				{
					color: "#ffffff",
				},
			],
		},
		{
			featureType: "road.arterial",
			elementType: "labels.text.fill",
			stylers: [
				{
					color: "#757575",
				},
			],
		},
		{
			featureType: "road.highway",
			elementType: "geometry",
			stylers: [
				{
					color: "#dadada",
				},
			],
		},
		{
			featureType: "road.highway",
			elementType: "labels.text.fill",
			stylers: [
				{
					color: "#616161",
				},
			],
		},
		{
			featureType: "road.local",
			elementType: "labels.text.fill",
			stylers: [
				{
					color: "#9e9e9e",
				},
			],
		},
		{
			featureType: "transit.line",
			elementType: "geometry",
			stylers: [
				{
					color: "#e5e5e5",
				},
			],
		},
		{
			featureType: "transit.station",
			elementType: "geometry",
			stylers: [
				{
					color: "#eeeeee",
				},
			],
		},
		{
			featureType: "water",
			elementType: "geometry",
			stylers: [
				{
					color: "#e0e0e0",
				},
			],
		},
		{
			featureType: "water",
			elementType: "labels.text.fill",
			stylers: [
				{
					color: "#9e9e9e",
				},
			],
		},
	];

	return stylesArray;
}

function ensureContactMapLocationsCache() {
	const locationPanelElements = $(".contact-location-panel");

	locationPanelElements.each(function () {
		const locationPanelElement = $(this);
		const locationIdString = locationPanelElement.data("locationId");

		if (!locationIdString) {
			return;
		}

		if (contactMapLocationsByIdObject[locationIdString]) {
			return;
		}

		const addressString = locationPanelElement.data("address") || "";
		const latitudeString = locationPanelElement.data("lat") || "";
		const longitudeString = locationPanelElement.data("lng") || "";

		const locationObject = {
			id: locationIdString,
			address: addressString,
			lat: null,
			lng: null,
			isResolved: false,
		};

		if (latitudeString !== "" && longitudeString !== "") {
			const latitudeNumber = parseFloat(latitudeString);
			const longitudeNumber = parseFloat(longitudeString);

			if (!Number.isNaN(latitudeNumber) && !Number.isNaN(longitudeNumber)) {
				locationObject.lat = latitudeNumber;
				locationObject.lng = longitudeNumber;
				locationObject.isResolved = true;
			}
		}

		contactMapLocationsByIdObject[locationIdString] = locationObject;
	});
}

function setContactMapMarkerPosition(locationObject) {
	if (!contactMapObject || !locationObject) {
		return;
	}

	const positionObject = {
		lat: locationObject.lat,
		lng: locationObject.lng,
	};

	if (!contactMapMarkerObject) {
		contactMapMarkerObject = new google.maps.Marker({
			map: contactMapObject,
			position: positionObject,
		});
	} else {
		contactMapMarkerObject.setPosition(positionObject);
	}

	contactMapObject.panTo(positionObject);
	contactMapObject.setZoom(7);
}

window.updateContactMapLocation = function (locationIdString) {
	if (!contactMapObject || !locationIdString) {
		return;
	}

	const locationObject = contactMapLocationsByIdObject[locationIdString];

	if (!locationObject) {
		return;
	}

	if (
		locationObject.isResolved &&
		typeof locationObject.lat === "number" &&
		typeof locationObject.lng === "number"
	) {
		setContactMapMarkerPosition(locationObject);
		return;
	}

	if (!contactMapGeocoderObject || !locationObject.address) {
		return;
	}

	contactMapGeocoderObject.geocode(
		{
			address: locationObject.address,
		},
		function (resultsArray, statusString) {
			if (statusString !== "OK") {
				return;
			}

			if (!resultsArray || !resultsArray.length) {
				return;
			}

			const firstResultObject = resultsArray[0];

			if (!firstResultObject.geometry || !firstResultObject.geometry.location) {
				return;
			}

			const latitudeNumber = firstResultObject.geometry.location.lat();
			const longitudeNumber = firstResultObject.geometry.location.lng();

			locationObject.lat = latitudeNumber;
			locationObject.lng = longitudeNumber;
			locationObject.isResolved = true;

			setContactMapMarkerPosition(locationObject);
		}
	);
};

window.initContactMap = function () {
	const mapElement = document.getElementById("map");

	if (!mapElement) {
		return;
	}

	const defaultCenterObject = {
		lat: 53.4,
		lng: -7.9,
	};

	contactMapObject = new google.maps.Map(mapElement, {
		center: defaultCenterObject,
		zoom: 6,
		styles: getContactMapStylesArray(),
		disableDefaultUI: true,
		gestureHandling: "cooperative",
	});

	contactMapGeocoderObject = new google.maps.Geocoder();

	ensureContactMapLocationsCache();

	const defaultLocationButtonElement = $(
		".contact__location-button.is-active"
	).first();

	if (defaultLocationButtonElement.length) {
		const defaultLocationIdString =
			defaultLocationButtonElement.data("locationId");

		if (defaultLocationIdString) {
			window.updateContactMapLocation(defaultLocationIdString);
		}
	}
};

$(function () {
	initContactScrollLink();
	initContactTabs();
});
