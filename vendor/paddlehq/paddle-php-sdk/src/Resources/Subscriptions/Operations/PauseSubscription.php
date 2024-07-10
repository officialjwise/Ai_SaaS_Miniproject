<?php

declare(strict_types=1);

namespace Paddle\SDK\Resources\Subscriptions\Operations;

use Paddle\SDK\Entities\DateTime;
use Paddle\SDK\Entities\Subscription\SubscriptionEffectiveFrom;

class PauseSubscription implements \JsonSerializable
{
    public function __construct(
        public readonly SubscriptionEffectiveFrom|null $effectiveFrom = null,
        public readonly \DateTimeInterface|null $resumeAt = null,
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'effective_from' => $this->effectiveFrom,
            'resume_at' => isset($this->resumeAt) ? DateTime::from($this->resumeAt)?->format() : null,
        ];
    }
}
