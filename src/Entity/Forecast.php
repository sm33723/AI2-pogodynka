<?php

namespace App\Entity;

use App\Repository\ForecastRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ForecastRepository::class)]
class Forecast
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'forecasts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?City $city = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $timestamp = null;

    #[ORM\Column(nullable: true)]
    private ?float $temperature = null;

    #[ORM\Column(nullable: true)]
    private ?float $wind_speed = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $wind_direction = null;

    #[ORM\Column(nullable: true)]
    private ?float $humidity = null;

    #[ORM\Column(length: 64, nullable: true)]
    private ?string $air_quality = null;

    #[ORM\Column(nullable: true)]
    private ?float $cloud_cover = null;

    #[ORM\Column(nullable: true)]
    private ?float $cloud_ceiling = null;

    #[ORM\Column(nullable: true)]
    private ?float $rain = null;

    #[ORM\Column(nullable: true)]
    private ?float $visibility = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeInterface $timestamp): static
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(?float $temperature): static
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getWindSpeed(): ?float
    {
        return $this->wind_speed;
    }

    public function setWindSpeed(?float $wind_speed): static
    {
        $this->wind_speed = $wind_speed;

        return $this;
    }

    public function getWindDirection(): ?string
    {
        return $this->wind_direction;
    }

    public function setWindDirection(?string $wind_direction): static
    {
        $this->wind_direction = $wind_direction;

        return $this;
    }

    public function getHumidity(): ?float
    {
        return $this->humidity;
    }

    public function setHumidity(?float $humidity): static
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getAirQuality(): ?string
    {
        return $this->air_quality;
    }

    public function setAirQuality(?string $air_quality): static
    {
        $this->air_quality = $air_quality;

        return $this;
    }

    public function getCloudCover(): ?float
    {
        return $this->cloud_cover;
    }

    public function setCloudCover(?float $cloud_cover): static
    {
        $this->cloud_cover = $cloud_cover;

        return $this;
    }

    public function getCloudCeiling(): ?float
    {
        return $this->cloud_ceiling;
    }

    public function setCloudCeiling(?float $cloud_ceiling): static
    {
        $this->cloud_ceiling = $cloud_ceiling;

        return $this;
    }

    public function getRain(): ?float
    {
        return $this->rain;
    }

    public function setRain(?float $rain): static
    {
        $this->rain = $rain;

        return $this;
    }

    public function getVisibility(): ?float
    {
        return $this->visibility;
    }

    public function setVisibility(?float $visibility): static
    {
        $this->visibility = $visibility;

        return $this;
    }
}
